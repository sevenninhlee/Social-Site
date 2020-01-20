<?php
class queries_controller extends right_bar_data_controller
{
	public function index() {
		global $app;
		$wheres = ["admin_status" => '1', "owner_status" => '1'];
		$bcm = new queries_category_model();
		if(isset($_GET['cat'])) {
			$categoryData = $bcm->getRecordWhere(['slug' => $_GET['cat']]);
			if($categoryData) $category_id = $categoryData['id'];
			$wheres = array_merge($wheres, ['categories_arr' => $category_id]);
		}
		if(isset($_GET['archive'])) {
			$date = explode("-",trim($_GET['archive']));
			$wheres = array_merge($wheres, ["MONTH(queries_articles.created)" => $date[0], "YEAR(queries_articles.created)" => date("Y")]);
		}	
		$queries_article = new queries_article_model();
		$queries_articles = $queries_article->read_paging($queries_article, 'created', $wheres);
		if(!empty($queries_articles['data'])){
			$review_rating = new review_rating_model();
			$this->records = $review_rating->getTotalAll($queries_articles, "queries_article_model");
			foreach($this->records['data'] as $key => $record) {
				$this->records['data'][$key]['ListCate'] = $bcm->getCatOfQueriesPublic($record['categories_arr']);
			}
		}
        $conditions = 'admin_status = 1 AND owner_status = 1';
        $this->newQueries = $queries_article->all('*, queries_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['queries_category'], 'order'=> ' created DESC LIMIT 0,3']);
		if(!empty($this->newQueries)){
		foreach ($this->newQueries as $key => $record) {
			$this->newQueries[$key]['ListCate'] = $bcm->getCatOfQueriesPublic($record['categories_arr']);
		}
		}
		$this->display();
	}
	
	public function view($pr=null){
		global $app;
		$conditions = "owner_status = 1 AND admin_status = 1";
		$rpCondition = "owner_status = 1 AND admin_status = 1";
		$userID = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
		$slug['slug']=$pr[1];
		$bm = new queries_article_model();
		$obj_bm = $bm->getRecordWhere($slug);
		$id[1] = $obj_bm['id']; 
		$this->record = $bm->getRecord($id, "*", ['conditions'=>"", 'joins'=>['user']]);
		if(!$this->record){
			global $app;
			include "views/".$app['areaPath']."staticpages/error.php";
			exit();
		}
		$um = new user_model();
		$user = $um->getRecord($this->record['user_id']);
		$this->record['username'] = $user['show_name'] == 0 ? $user['firstname'].' '.$user['lastname'] :$user['username'];
		$this->record['user_avatar'] = $user['avata'];
		$bulletin = new bulletin_model();
		$this->record['user_bulletin'] = mysqli_fetch_assoc($bulletin->getAllRecords(
			'*',
			[ 'conditions' => "user_id={$this->record['user_id']}",'order'=>'updated DESC']
		))['content'];
		
		$this->obj_id = $id[1];
		
		$queries = new queries_category_model();
		$this->category = $queries->getCatOfQueriesPublic($this->record['categories_arr']);
		
		$reviews = new review_rating_model();
		$this->reviews = $reviews->getUserRating($userID, $id[1], "queries_article_model");

		$rpCondition .= " AND table_model = 'queries_article_model' AND object_article_id = {$id[1]} AND review_parent_id != 0";
		$this->reply = $reviews->getAllRecords('users.*, review_ratings.*', ['conditions'=>$rpCondition, 'joins'=>['user'], 'order'=>'created ASC']);
		
		$conditions .= " AND table_model = 'queries_article_model' AND object_article_id = {$id[1]} AND review_parent_id = 0";

		$this->records = $reviews->allp('*',['conditions'=>$conditions, 'joins'=>['user'], 'order'=>'updated DESC']);

		$lkm = new like_model();
		foreach($this->records['data'] as $key => $record){
			$this->records['data'][$key]['total_like'] = $lkm->totalLike($record['id'], 'review_rating_model');
			$this->records['data'][$key]['checkUserLike'] = $lkm->checkUserLike($userID, $record['id'], 'review_rating_model');
		}
		$this->newQueries = [];
		if(count($this->category)){
        	$conditions = "admin_status = 1 AND owner_status = 1 AND categories_arr like '%,".$this->category[0]['id'].",%' AND queries_articles.id!=".$id[1];
			$this->newQueries = $bm->all('*,queries_articles.id as queries_articles_id, queries_articles.slug as slug',['conditions'=>$conditions, 'joins'=>null, 'order'=> ' created DESC LIMIT 0,3']);
			if(!empty($this->newQueries)){
			foreach($this->newQueries as $key => $record){
				$this->newQueries[$key]['queries_categories_name'] = $this->category[0]['name'];
			}
			}
		}else{
			$conditions = "admin_status = 1 AND owner_status = 1 AND categories_arr like '%,0,%' AND queries_articles.id!=".$id[1];
			$this->newQueries = $bm->all('*,queries_articles.id as queries_articles_id, queries_articles.slug as slug',['conditions'=>$conditions, 'joins'=>null, 'order'=> ' created DESC LIMIT 0,3']);
			if(!empty($this->newQueries)){
			foreach($this->newQueries as $key => $record){
				$this->newQueries[$key]['queries_categories_name'] = "Unkown category";
			}
			}
		}		
		$this->display();
	}
}
?>
