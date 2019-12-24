<?php

class films_controller extends vendor_backend_controller {
	public function categories() {
		global $app;
		$conditions = "";
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
		}
		if(isset($app['prs']['search'])){
			$search = $app['prs']['search'];
			$search = string_helper_model::process($search);
			$conditions .= (($conditions)? " AND (":"(").
			" name like '%".$search."%')";
		}
		$film = new film_category_model();
		$this->records = $film->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->noActives = $film->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}


	public function category_add(){
		global $app;
		$name = $app['prs']['name'];
		$slug = $app['prs']['slug'];
		$category = new film_category_model();
		$categoryData['name'] = $name;
		$categoryData['slug'] = $slug;
		$categoryData['status'] = 1;
		$valid = $category->validator($categoryData);
		if($valid['status']) {
			if($category->addRecord($categoryData))
				header("Location: ".vendor_app_util::url(["ctl"=>"users"]));
			else {
				$this->errors = ['database'=>'An error occurred when inserting data! '. $category->errors['message']];
				$this->record = $categoryData;
			}
		} else {
			http_response_code(500);
			echo json_encode($category::convertErrorMessage($valid['message']));
			$this->errors = $category::convertErrorMessage($valid['message']);
			$this->record = $categoryData;
		}
	}

	public function category_edit(){
		global $app;
		$data['name'] = $_POST['name'];
		$data['slug'] = $_POST['slug'];
		$id = $app['prs']['id'];
		$category = new film_category_model();
		$valid = $category->validator($data, $id);
		if($valid['status']) {
			if($category->editRecord($id, $data)) {
				$data = [
					'status' => true,
					'message' => 'Update successful!'
				];
				http_response_code(200);
				echo json_encode($data);
			} else {
				$data = [
					'status' => false,
					'error' => 'An error occurred when editing data!'
				];
				http_response_code(500);
				echo json_encode($data);
			}
		} else {
			http_response_code(200);
			$data = [
				'status' => false,
				'error' => $category::convertErrorMessage($valid['message'])
			];
			echo json_encode($data);
		}
	}


	//----------------------BOOK comment-------------------------------------------------------------------
	public function comment_replies($id){
		global $app;
		$review_rating = new review_rating_model();
		$this->records = $review_rating->getAllCommentsReplies($id['1']);
		http_response_code(200);
		echo json_encode($this->records);
	}

	// public function comment_replies_del($id) {
	// 	$comment = new film_comment_reply_model();
	// 	if($comment->delRelativeRecord($id['1'])) {
	// 		echo "Delete Successful";
	// 	}
	// 	else echo "error";
	// }

	// public function comment_replies_delmany($ids){
	// 	global $app;
	// 	$ids = $app['prs']['ids'];
	// 	$comment = new film_comment_reply_model();
	// 	if($comment->delRelativeRecords($ids)) {
	// 		echo "Delete many successful";
	// 	}
	// 	else echo "error";
	// }


	//-----------------------BOOK---------------------------------------------------------------------------

	public function index() {
		global $app;
		$conditions = "";
		if(isset($app['prs']['author'])){
			$author = $app['prs']['author'];
			if($author != 'all')
			$conditions .= (($conditions)? " AND ":"")." user_id=".$author;
		}
		if(isset($app['prs']['category'])){
			$category = $app['prs']['category'];
			if($category != 'all')
			$conditions .= (($conditions)? " AND ":"")." categories_arr like '%,".$category.",%'";
		}
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." admin_status=".($status=='active'?1:0);
		}
		if(isset($app['prs']['search'])){
			$search = $app['prs']['search'];
			$search = string_helper_model::process($search);
			$conditions .= (($conditions)? " AND (":"(").
			" title like '%".$search."%' OR ".
			" film_articles.slug like '%".$search."%' OR ".
			" description like '%".$search."%')";
		}

		$conditionsTmp = $conditions;
		$user = new user_model();
		$this->users = $user->getAllRecords('*', ['conditions'=>'']);
		$filmCategory = new film_category_model();
		$this->categories = $filmCategory->getAllRecords('*', ['conditions'=>'']);
		$film_article = new film_article_model();
		$this->records = $film_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['user'], 'order'=>'created DESC']);
		foreach ($this->records['data'] as $key => $record) {
			$this->records['data'][$key]['ListCate'] = $filmCategory->getCatOfFilm($record['categories_arr']);
		}
		$this->noActives = $film_article->getCountRecords(['conditions'=>'admin_status=1']);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new film_article_model();
			$filmData = $_POST['film'];
			$filmData['user_id'] = $_SESSION['user']['id'];
			// $filmData['slug'] = gen_slug($_POST['film']['title']);
			if(isset($_POST['categories_arr'])){
				$filmData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$filmData['categories_arr'] = ',0,';
			}
			$filmData['categories_id'] = 1;
			$filmData = string_helper_model::processForm($filmData);
			if($_FILES['image']['tmp_name'])
				$filmData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($filmData);
			if($valid['status']) {
				if($bm->addRecord($filmData))
					header("Location: ".vendor_app_util::url(["ctl"=>"films"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $filmData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $filmData;
			}
		}

		$conditions = '';
		$film = new film_category_model();
		$this->categories = $film->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}


	//--------------------------------------------------------------------------

	public function view($id) {
		$conditions = '';
		$film = new film_category_model();
		$this->categories = $film->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new film_article_model();
		$this->record = $bm->getRecord($id);
		$this->category = $film->getRecord($this->record['categories_id']);
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'film_article_model');
		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "film_article_model");
		$rating = new review_rating_model();
		$this->average_rating = $rating->getAverageRating($id, "film_article_model");
		$this->display();
	}

	public function edit($id) {
		$bm = new film_article_model();
		$this->record = $bm->getRecord($id);
		$conditions = '';
		$film = new film_category_model();
		$this->categories = $film->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->category = $film->getCatOfFilm($this->record['categories_arr']);
		$bm = new film_article_model();
		$this->record = $bm->getRecord($id);
		// $this->category = $film->getRecord($this->record['categories_id']);
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'film_article_model');
		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "film_article_model");
		$rating = new review_rating_model();
		$this->average_rating = $rating->getAverageRating($id, "film_article_model");

		if(isset($_POST['btn_submit'])) {
			$filmData = $_POST['film'];
			if(isset($_POST['categories_arr'])){
				$filmData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$filmData['categories_arr'] = ',0,';
			}
			$filmData['categories_id'] = 1;
			$filmData = string_helper_model::processForm($filmData);
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$filmData['featured_image'] = $this->uploadImg($_FILES);
			}

			$valid = $bm->validator($filmData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $filmData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"films"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $filmData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $filmData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusFilmComment()
	{
		global $app;
		$id = $app['prs']['id'];
		$comment = new review_rating_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $comment);
	}

	// public function changeStatusFilmCommentReply()
	// {
	// 	global $app;
	// 	$id = $app['prs']['id'];
	// 	$commentRelpy = new film_comment_reply_model();
	// 	$data = [
	// 		'admin_status' => $_POST['status']
	// 	];
	// 	$this->changeStatus($id, $data, $commentRelpy);
	// }

	public function deleteFilmComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$filmComment = new review_rating_model();
		$this->handleDeleteMany($ids, $filmComment);
	}

	// public function deleteFilmCommentReply()
	// {
	// 	global $app;
	// 	$ids = $app['prs']['id'];
	// 	$filmCommentReply = new film_comment_reply_model();
	// 	$this->handleDeleteMany($ids, $filmCommentReply);
	// }

	public function changeStatusManyFilmComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$filmComment = new review_rating_model();
		$data = [
			'admin_status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $filmComment);
	}

	// public function changeStatusManyFilmCommentReply()
	// {
	// 	global $app;
	// 	$ids = $app['prs']['id'];
	// 	$filmCommentReply = new film_comment_reply_model();
	// 	$data = [
	// 		'status' => (int)$_POST['status']
	// 	];
	// 	$this->changeStatusMany($ids, $data, $filmCommentReply);
	// }

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusFilmArticle()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new film_article_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $article);
	}

	public function changeStatusFilmCategory()
	{
		global $app;
		$id = $app['prs']['id'];
		$category = new film_category_model();
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $category);
	}

	public function changeStatus($id, $dataRecord, $model) {
		if($model->editRecord($id, $dataRecord)){
			$data = [
				'status' => true,
				'message' => 'Change status successful!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => false,
				'error' => 'An error occurred when Edit data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}



	// ////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function deleteFilmCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new film_category_model();
		$this->handleDeleteMany($ids, $category);
		$category = new film_article_model();
		$category->setToUnknownCategories($ids);
	}

	public function deleteFilmArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new film_article_model();
		$this->handleDeleteMany($ids, $article);
	}

	public function handleDeleteMany($ids, $model) {
		if ($model->delRelativeRecords($ids)){
			$data = [
				'status' => true,
				'message' => 'Delete successful!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => false,
				'error' => 'An error occurred when delete data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

	public function changeStatusManyFilmCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new film_category_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $category);
	}

	public function changeStatusManyFilmArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new film_article_model();
		$data = [
			'admin_status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $article);
	}

	public function changeStatusMany($ids, $dataRecord, $model) {
		$ids = explode(",",$ids);
		if( !empty($ids) && count($ids) > 0 ) {
			foreach ($ids as $id) {
				$model->editRecord($id, $dataRecord);
			}
			$data = [
				'status' => true,
				'message' => 'Edit successful!'
			];
			http_response_code(200);
			echo json_encode($data);	
		} else {
			$data = [
				'status' => false,
				'error' => 'An error occurred when edit data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

}

?>