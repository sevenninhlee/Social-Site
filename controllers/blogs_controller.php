<?php
class blogs_controller extends right_bar_data_controller
{
	public function index() {
		
		$wheres = ["admin_status" => 1, "owner_status" => 1, 'featured_my_blog' => 1];
		$bcm = new blog_category_model();
		if(isset($_GET['cat'])) {
			$categoryData = $bcm->getRecordWhere(['slug' => $_GET['cat']]);
			if($categoryData) $category_id = $categoryData['id'];
			$wheres = array_merge($wheres, ['categories_arr' => $category_id]);
		}
		if(isset($_GET['archive'])) {
			$date = explode("-",trim($_GET['archive']));
			$wheres = array_merge($wheres, ["MONTH(blog_articles.created)" => $date[0], "YEAR(blog_articles.created)" => date("Y")]);
		}	
		$blog_article = new blog_article_model();
		$blog_articles = $blog_article->read_paging($blog_article, 'created', $wheres);
		if(!empty($blog_articles['data'])){
			$review_rating = new review_rating_model();
			$this->records = $review_rating->getTotalAll($blog_articles, "blog_article_model");
			foreach($this->records['data'] as $key => $record) {
				$this->records['data'][$key]['ListCate'] = $bcm->getCatOfBologPublic($record['categories_arr']);
				$um = new user_model();
				$user = $um->getRecord($record['user_id']);
				$this->records['data'][$key]['username'] = vendor_html_helper::showUserName($user);
			}
		}
        $conditions = 'admin_status = 1 AND owner_status = 1 AND featured_my_blog = 1';
        $this->newBlogs = $blog_article->all('*, blog_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['blog_category'], 'order'=> ' created DESC LIMIT 0,3']);	
		if(!empty($this->newBlogs)){
		foreach ($this->newBlogs as $key => $record) {
			$this->newBlogs[$key]['ListCate'] = $bcm->getCatOfBologPublic($record['categories_arr']);
		}	
		}	
		$this->display();
	}

	public function view($pr=null){
		global $app;
		$conditions = "owner_status = 1 AND admin_status = 1";
		$rpCondition = "owner_status = 1 AND admin_status = 1";
		$userID = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
		$slug['slug'] = $pr['1'];
		$bm = new blog_article_model();
		$obj_bm = $bm->getRecordWhere($slug);
		$id[1] = $obj_bm['id'];
		$this->record = $bm->getRecord($id);
        if(!$this->record){
            global $app;
            include "views/".$app['areaPath']."staticpages/error.php";
            exit();
        }  
		$um = new user_model();
		$user = $um->getRecord($this->record['user_id']);
		$this->record['username'] = vendor_html_helper::showUserName($user);
		$this->record['user_avatar'] = $user['avata'];
		$bulletin = new bulletin_model();
		$this->record['user_bulletin'] = mysqli_fetch_assoc($bulletin->getAllRecords(
			'*',
			[ 'conditions' => "user_id={$this->record['user_id']}",'order'=>'updated DESC']
		))['content'];

		$blog = new blog_category_model();
		$this->category = $blog->getCatOfBologPublic($this->record['categories_arr']);

		$reviews = new review_rating_model();
		$this->getAveRating = $reviews->getAverageRating($id[1], "blog_article_model");
    $this->reviews = $reviews->getUserRating($userID, $id[1], "blog_article_model");
    $this->loadmoreData = [
      'slug' => $this->record['slug'],
      'model' => 'blog',
      'ctl' => 'blogs',
      'id' => $id[1],
      'page' => 2,
      'user_logged' => isset($_SESSION['user'])?$_SESSION['user']['id']:''
    ];

		$rpCondition .= " AND table_model = 'blog_article_model' AND object_article_id = {$id[1]} AND review_parent_id != 0";
		$this->reply = $reviews->getAllRecords('users.*, review_ratings.*', ['conditions'=>$rpCondition, 'joins'=>['user'], 'order'=>'created ASC']);
		
		$conditions .= " AND table_model = 'blog_article_model' AND object_article_id = {$id[1]} AND review_parent_id = 0";
    $this->records = $reviews->allp('*',['conditions'=>$conditions, 'joins'=>['user'], 'order'=>'updated DESC']);
    
		$lkm = new like_model();
		foreach($this->records['data'] as $key => $record){
			$this->records['data'][$key]['total_like'] = $lkm->totalLike($record['id'], 'review_rating_model');
			$this->records['data'][$key]['checkUserLike'] = $lkm->checkUserLike($userID, $record['id'], 'review_rating_model');
		}
		$this->newBlogs= [];

		if(count($this->category)){
        	$conditions = "admin_status = 1 AND owner_status = 1 AND categories_arr like '%,".$this->category[0]['id'].",%' AND blog_articles.id!=".$id[1];
			$this->newBlogs = $bm->all('*,blog_articles.id as blog_articles_id, blog_articles.slug as slug',['conditions'=>$conditions, 'joins'=>null, 'order'=> ' created DESC LIMIT 0,3']);
			if(!empty($this->newBlogs)){
			foreach($this->newBlogs as $key => $record){
				$this->newBlogs[$key]['blog_categories_name'] = $this->category[0]['name'];
			}
			}
		}else{
			$conditions = "admin_status = 1 AND owner_status = 1 AND categories_arr like '%,0,%' AND book_articles.id!=".$id[1];
			$this->newBlogs = $bm->all('*,blog_articles.id as blog_articles_id, blog_articles.slug as slug',['conditions'=>$conditions, 'joins'=>null, 'order'=> ' created DESC LIMIT 0,3']);
			if(!empty($this->newBlogs)){
			foreach($this->newBlogs as $key => $record){
				$this->newBlogs[$key]['blog_categories_name'] = "Unkown category";
			}
			}
		}		
		$this->display();
  }
  
  public function loadmore()
  {
    parent::loadmore();
  }
}
?>
