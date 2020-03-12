<?php
class books_controller extends right_bar_data_controller
{
	public function index() {
		global $app;
		$wheres = ["admin_status" => '1', "owner_status" => '1', "owner_group_status" => '0'];
		$bcm = new book_category_model();
		if(isset($_GET['cat'])) {
			$categoryData = $bcm->getRecordWhere(['slug' => $_GET['cat']]);
			if($categoryData) $category_id = $categoryData['id'];
			$wheres = array_merge($wheres, ['categories_arr' => $category_id]);
		}

		if(isset($_GET['archive'])) {
			$date = explode("-",trim($_GET['archive']));
			$wheres = array_merge($wheres, ["MONTH(book_articles.created)" => $date[0], "YEAR(book_articles.created)" => date("Y")]);
		}		
		$book_article = new book_article_model();
		$book_articles = $book_article->read_paging($book_article, 'created', $wheres);
		if(!empty($book_articles['data'])){
			$review_rating = new review_rating_model();
			$this->records = $review_rating->getTotalAll($book_articles, "book_article_model");
			foreach($this->records['data'] as $key => $record) {
				$this->records['data'][$key]['ListCate'] = $bcm->getCatOfBook($record['categories_arr']);
				$um = new user_model();
				$user = $um->getRecord($record['user_id']);
				$this->records['data'][$key]['username'] = vendor_html_helper::showUserName($user);
			}
		}
		$this->display();
	}

	public function book_review($pr){
		global $app;
		$conditions = "owner_status = 1 AND admin_status = 1";
		$rpCondition = "owner_status = 1 AND admin_status = 1";
		$userID = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
		$slug['slug'] = $pr['1'];
		$bm = new book_article_model();
		if($this->record = $bm->getRecordWhere($slug)){
			$id = $this->record['id'];
			$book = new book_category_model();
			$this->category = $book->getCatOfBook($this->record['categories_arr']);
			
			$reviews = new review_rating_model();
			$this->getAveRating = $reviews->getAverageRating($id, "book_article_model");
			$this->reviews = $reviews->getUserRating($userID, $id, "book_article_model");

			$rpCondition .= " AND table_model = 'book_article_model' AND object_article_id = {$id} AND review_parent_id != 0 AND admin_status=1";
			$this->reply = $reviews->getAllRecords('users.*, review_ratings.*', ['conditions'=>$rpCondition, 'joins'=>['user'], 'order'=>'created ASC']);
			
			$conditions .= " AND table_model = 'book_article_model' AND object_article_id = {$id} AND review_parent_id = 0 AND owner_status = 1 AND admin_status = 1 AND admin_status=1";
			$this->records = $reviews->allp('*',['conditions'=>$conditions, 'joins'=>['user'], 'order'=>'updated DESC']);

			$lkm = new like_model();
			foreach($this->records['data'] as $key => $record){
				$this->records['data'][$key]['total_like'] = $lkm->totalLike($record['id'], 'review_rating_model');
				$this->records['data'][$key]['checkUserLike'] = $lkm->checkUserLike($userID, $record['id'], 'review_rating_model');
			}
			
			$this->display();
		} else {
			header( "Location: ".vendor_app_util::url(['ctl'=>'staticpages',  "act"=>"error"]));
		}
	}
}
