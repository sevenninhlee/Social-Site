<?php 
class films_controller extends right_bar_data_controller {
    public function index(){
        global $app;   
		$fm = new film_article_model();
		$bcm = new film_category_model();
		$wheres = ["admin_status" => '1', "owner_status" => '1'];
		if(isset($_GET['cat'])) {
			$categoryData = $bcm->getRecordWhere(['slug' => $_GET['cat']]);
			if($categoryData) $category_id = $categoryData['id'];
			$wheres = array_merge($wheres, ['categories_arr' => $category_id]);
		}
		if(isset($_GET['archive'])) {
			$date = explode("-",trim($_GET['archive']));
			$wheres = array_merge($wheres, ["MONTH(film_articles.created)" => $date[0], "YEAR(film_articles.created)" => date("Y")]);
		}
		$this->records = $fm->read_paging($fm, 'created', $wheres);
		if(!empty($this->records['data'])){
			foreach($this->records['data'] as $key => $record) {
				$this->records['data'][$key]['ListCate'] = $bcm->getCatOfFilmPublic($record['categories_arr']);
			}
		}
        $conditions = 'admin_status = 1 AND owner_status = 1';
		$this->newFilms = $fm->all('*, film_articles.slug as slug',['conditions'=>$conditions, 'joins'=>null, 'order'=> ' created DESC LIMIT 0,3']);
		if(!empty($this->newFilms)){
		foreach ($this->newFilms as $key => $record) {
			$this->newFilms[$key]['ListCate'] = $bcm->getCatOfFilmPublic($record['categories_arr']);
		}
		}
        $this->display();
    }

    public function review($pr=null)
    {

        global $app;
		$conditions = "owner_status = 1 AND admin_status = 1";
		$rpCondition = "owner_status = 1 AND admin_status = 1";
		$userID = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
		// echo "Start <br/>"; echo '<pre>'; print_r($userID);echo '</pre>';exit("End Data");
		$slug['slug'] = $pr['1'];
		$fm = new film_article_model();
		$obj_fm = $fm->getRecordWhere($slug);
		$id[1] = $obj_fm['id'];

		$this->record = $fm->getRecord($id);
		if(!$this->record){
			global $app;
			include "views/".$app['areaPath']."staticpages/error.php";
			exit();
		}

		$um = new user_model();
		$user = $um->getRecord($this->record['user_id']);
		$this->record['username'] = $user['firstname'].' '.$user['lastname'];
		$this->record['user_avatar'] = $user['avata'];
		$bulletin = new bulletin_model();
		$this->record['user_bulletin'] = mysqli_fetch_assoc($bulletin->getAllRecords(
			'*',
			[ 'conditions' => "user_id={$this->record['user_id']}",'order'=>'updated DESC']
		))['content'];

		if(strpos($this->record['link'], "https://www.youtube.com/") !== false){
			$this->record['link'] = $this->getYoutubeEmbedUrl($this->record['link']);
		}
		$film = new film_category_model();
		$this->category = $film->getCatOfFilmPublic($this->record['categories_arr']);
		
		$reviews = new review_rating_model();
		$this->getAveRating = $reviews->getAverageRating($id[1], "film_article_model");
		$this->reviews = $reviews->getUserRating($userID, $id[1], "film_article_model");
		$this->count = $reviews->countAllUsers($id[1], "film_article_model");
		$rpCondition .= " AND table_model = 'film_article_model' AND object_article_id = {$id[1]} AND review_parent_id != 0";
		$this->reply = $reviews->getAllRecords('users.*, review_ratings.*', ['conditions'=>$rpCondition, 'joins'=>['user'], 'order'=>'created ASC']);
		
		$conditions .= " AND table_model = 'film_article_model' AND object_article_id = {$id[1]} AND review_parent_id = 0";
		$this->records = $reviews->allp('*',['conditions'=>$conditions, 'joins'=>['user'], 'order'=>'updated DESC']);
		$this->newFilms = [];
		if(count($this->category)){
        	$conditions = "admin_status = 1 AND owner_status = 1 AND categories_arr like '%,".$this->category[0]['id'].",%' AND film_articles.id!=".$id[1];
			$this->newFilms = $fm->all('*,film_articles.id as film_articles_id, film_articles.slug as slug',['conditions'=>$conditions, 'joins'=>null, 'order'=> ' created DESC LIMIT 0,3']);
			if(!empty($this->newFilms)){
			foreach($this->newFilms as $key => $record){
				$this->newFilms[$key]['film_categories_name'] = $this->category[0]['name'];
			}
			}
		}else{
			$conditions = "admin_status = 1 AND owner_status = 1 AND categories_arr like '%,0,%' AND film_articles.id!=".$id[1];
			$this->newFilms = $fm->all('*,film_articles.id as film_articles_id, film_articles.slug as slug',['conditions'=>$conditions, 'joins'=>null, 'order'=> ' created DESC LIMIT 0,3']);
			if(!empty($this->newFilms)){
			foreach($this->newFilms as $key => $record){
				$this->newFilms[$key]['film_categories_name'] = "Unkown category";
			}
			}
		}		

		$this->display();
    }
    
    public function getYoutubeEmbedUrl($url)
	{
	    // $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
	    // $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

	    // if (preg_match($longUrlRegex, $url, $matches)) {
	    //     $youtube_id = $matches[count($matches) - 1];
	    // }

	    // if (preg_match($shortUrlRegex, $url, $matches)) {
	    //     $youtube_id = $matches[count($matches) - 1];
	    // }
	    // return 'https://www.youtube.com/embed/' . $youtube_id ;
	    
	    $urlParts   = explode('/', $url);
    	$vidid      = explode( '&', str_replace('watch?v=', '', end($urlParts) ) );

    	return 'https://www.youtube.com/embed/' . $vidid[0] ;
	}

}

?>