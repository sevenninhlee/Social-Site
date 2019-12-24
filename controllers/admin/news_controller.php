<?php

class news_controller extends vendor_backend_controller {
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
		$new = new new_category_model();
		$this->records = $new->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->noActives = $new->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}

	public function category_add(){
		global $app;
		$name = $app['prs']['name'];
		$slug = $app['prs']['slug'];
		$category = new new_category_model();
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
			http_response_code(200);
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
		$category = new new_category_model();
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
				http_response_code(200);
				echo json_encode($data);
			}
		} else {
			http_response_code(200);
			echo json_encode($category::convertErrorMessage($valid['message']));
			$this->errors = $category::convertErrorMessage($valid['message']);
			$this->record = $data;
		}
	}

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
			$conditions .= (($conditions)? " AND ":"")." categories_arr like '%".$category."%'";
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
			" new_articles.slug like '%".$search."%' OR ".
			" description like '%".$search."%')";
		}

		$conditionsTmp = $conditions;
		$user = new user_model();
		$this->users = $user->getAllRecords('*', ['conditions'=>'']);
		$newCategory = new new_category_model();
		$this->categories = $newCategory->getAllRecords('*', ['conditions'=>'']);
		$new_article = new new_article_model();
		$this->records = $new_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['user'], 'order'=>'created DESC']);
		foreach ($this->records['data'] as $key => $record) {
			$this->records['data'][$key]['ListCate'] = $newCategory->getCatOfNew($record['categories_arr']);
		}
		$this->noActives = $new_article->getCountRecords(['conditions'=>'admin_status=1']);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new new_article_model();
			$newData = $_POST['new'];
			$newData = string_helper_model::processForm($newData);
			$newData['user_id'] = $_SESSION['user']['id'];
			// $newData['slug'] = gen_slug($_POST['new']['title']);
			if(isset($_POST['categories_arr'])){
				$newData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$newData['categories_arr'] = ',0,';
			}
			$newData['categories_id'] = 1;
			if($_FILES['image']['tmp_name'])
				$newData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($newData);
			if($valid['status']) {
				if($bm->addRecord($newData))
					header("Location: ".vendor_app_util::url(["ctl"=>"news"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $newData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $newData;
			}
		}

		$conditions = '';
		$new = new new_category_model();
		$this->categories = $new->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}

	public function view($id) {
		$conditions = '';
		$new = new new_category_model();
		$this->categories = $new->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new new_article_model();
		$this->record = $bm->getRecord($id);
		$this->category = $new->getRecord($this->record['categories_id']);
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'new_article_model');
		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "new_article_model");
		$this->display();
	}

	public function edit($id) {
		$conditions = '';
		$new = new new_category_model();
		$this->categories = $new->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new new_article_model();
		$this->record = $bm->getRecord($id);
		// $this->category = $new->getRecord($this->record['categories_id']);
		$this->category = $new->getCatOfNew($this->record['categories_arr']);

		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'new_article_model');
		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "new_article_model");

		if(isset($_POST['btn_submit'])) {
			$newData = $_POST['new'];
			if(isset($_POST['categories_arr'])){
				$newData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$newData['categories_arr'] = ',0,';
			}
			$newData['categories_id'] = 1;
			$newData = string_helper_model::processForm($newData);
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$newData['featured_image'] = $this->uploadImg($_FILES);
			}

			$valid = $bm->validator($newData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $newData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"news"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $newData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $newData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	public function changeStatusNewArticle()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new new_article_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $article);
	}

	public function changeStatusNewCategory()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new new_category_model();
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $article);
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

	public function deleteNewCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new new_category_model();
		$this->handleDeleteMany($ids, $article);
		$category = new new_article_model();
		$category->setToUnknownCategories($ids);
	}

	public function deleteNewArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new new_article_model();
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

	public function changeStatusManyNewCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new new_category_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $article);
	}

	public function changeStatusManyNewArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new new_article_model();
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

	//----------------------BOOK comment-------------------------------------------------------------------
	public function comment_replies($id){
		global $app;
		$review_rating = new review_rating_model();
		$this->records = $review_rating->getAllCommentsReplies($id['1']);
		http_response_code(200);
		echo json_encode($this->records);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusNewComment()
	{
		global $app;
		$id = $app['prs']['id'];
		$comment = new review_rating_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $comment);
	}

	public function deleteNewComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$newComment = new review_rating_model();
		$this->handleDeleteMany($ids, $newComment);
	}

	public function changeStatusManyNewComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$newComment = new review_rating_model();
		$data = [
			'admin_status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $newComment);
	}

}

?>