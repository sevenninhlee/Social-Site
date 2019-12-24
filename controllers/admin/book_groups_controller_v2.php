<?php

class book_groups_controller extends vendor_backend_controller {
	public function categories() {
		global $app;
		$conditions = "";
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
		}
		if(isset($search)){
			$search = $app['prs']['search'];
			$search = string_helper_model::process($search);
			$conditions .= (($conditions)? " AND (":"(").
			" name like '%".$search."%')";
		}
		$categories = new book_group_category_model();
		$this->records = $categories->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->noActives = $categories->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}

	public function category_add(){
		global $app;
		$name = $app['prs']['name'];
		$slug = $app['prs']['slug'];
		$categoryData['name'] = $name;
		$categoryData['slug'] = $slug;
		$categoryData['status'] = 1;
		$category = new book_group_category_model();
		$valid = $category->validator($categoryData);
		if($valid['status']) {
			if($category->addRecord($categoryData))
				header("Location: ".vendor_app_util::url(["ctl"=>"/book_groups/categories"]));
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
		$category = new book_group_category_model();
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
			$data = [
				'status' => false,
				'error' => $category::convertErrorMessage($valid['message'])
			];
			echo json_encode($data);
		}
	}


	//----------------------comment-------------------------------------------------------------------
	public function comment_replies($id){
		global $app;
		$comments = new book_group_comment_reply_model();
		$this->records = $comments->allp('*',['conditions'=>'book_group_comment_id='.$id['1'], 'joins'=>['user'], 'order'=>'id ASC']);
		$this->noActives = $comments->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}

	public function comment_replies_del($id) {
		$comment = new book_group_comment_reply_model();
		if($comment->delRelativeRecord($id['1'])) {
			echo "Delete Successful";
		}
		else echo "error";
	}

	public function comment_replies_delmany($ids){
		global $app;
		$ids = $app['prs']['ids'];
		$comment = new book_group_comment_reply_model();
		if($comment->delRelativeRecords($ids)) {
			echo "Delete many successful";
		}
		else echo "error";
	}


	//-----------------------Index---------------------------------------------------------------------------

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
			$conditions .= (($conditions)? " AND ":"")." categories_id=".$category;
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
			" title like '%".$search."%')";
		}
		$conditionsTmp = $conditions;
		$user = new user_model();
		$this->users = $user->getAllRecords('*', ['conditions'=>'']);
		$book_group = new book_category_model();
		$this->categories = $book_group->getAllRecords('*', ['conditions'=>'']);
		$book_group_article = new book_group_article_model();
		$this->records = $book_group_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['user', 'book_category'], 'order'=>'created DESC']);
		foreach ($this->records['data'] as $key => $record) {
			$this->records['data'][$key]['ListCate'] = $book_group->getCatOfBook($record['categories_arr']);
		}
		$this->noActives = $book_group_article->getCountRecords(['conditions'=>'admin_status=1']);
		
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new book_group_article_model();
			$blogData = $_POST['book_group'];
			$blogData = string_helper_model::processForm($blogData);
			$blogData['user_id'] = $_SESSION['user']['id'];
			if(isset($_POST['categories_arr'])){
				$blogData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$blogData['categories_arr'] = ',0,';
			}
			$blogData['categories_id'] = 1;
			if($_FILES['image']['tmp_name'])
				$blogData['featured_image'] = $this->uploadImg($_FILES);
			
			$valid = $bm->validator($blogData);
			if($valid['status']) {
				if($bm->addRecord($blogData))
					header("Location: ".vendor_app_util::url(["ctl"=>"book_groups"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $blogData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $blogData;
			}
		}

		$conditions = '';
		$book_group_article = new book_category_model();
		$this->categories = $book_group_article->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}

	public function view($id) {
		$conditions = '';
		$book_group_category = new book_category_model();
		$this->categories = $book_group_category->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$book_group_article = new book_group_article_model();
		$this->record = $book_group_article->getRecord($id);
		$this->category = $book_group_category->getRecord($this->record['categories_id']);
		$book_group_article_user = new book_group_article_user_model();
		$this->members = $book_group_article_user->getUsers($id);
		$book_group_article_book = new book_group_article_book_model();
		$this->books = $book_group_article_book->getBooks($id);
		$this->display();
	}

	public function edit($id) {
		$conditions = '';
		$book_group_category = new book_category_model();
		$this->categories = $book_group_category->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$book_group_article = new book_group_article_model();
		$this->record = $book_group_article->getRecord($id);
		// $this->category = $book_group_category->getRecord($this->record['categories_id']);
		$this->category = $book_group_category->getCatOfBook($this->record['categories_arr']);

		$book_group_article_user = new book_group_article_user_model();
		$this->members = $book_group_article_user->getUsers($id);
		$book_group_article_book = new book_group_article_book_model();
		// $this->books = $book_group_article_book->getBooks($id);
		$this->actionPrevious = $book_group_article_book->getBooks($id, " AND  bb.owner_status = 1 AND  bb.previous_read_status != 0");
		$this->actionCurrent = $book_group_article_book->getBooks($id, " AND bb.owner_status = 1 AND  bb.current_read_status != 0");
		// echo "Start <br/>"; echo '<pre>'; print_r($this->actionCurrent);echo '</pre>';exit("End Data");
		$bm = new book_group_article_model();

		if(isset($_POST['btn_submit'])) {
			$blogData = $_POST['book_group'];
			if(isset($_POST['categories_arr'])){
				$blogData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$blogData['categories_arr'] = ',0,';
			}
			$blogData['categories_id'] = 1;
			$blogData = string_helper_model::processForm($blogData);
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$blogData['featured_image'] = $this->uploadImg($_FILES);
			}

			$valid = $bm->validator($blogData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $blogData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"book_groups"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $blogData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $blogData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	public function changeStatusBlogComment()
	{
		global $app;
		$id = $app['prs']['id'];
		$comment = new review_rating_model();
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $comment);
	}

	public function changeStatusBlogCommentReply()
	{
		global $app;
		$id = $app['prs']['id'];
		$commentRelpy = new book_group_comment_reply_model();
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $commentRelpy);
	}

	public function deleteBlogComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$blogComment = new review_rating_model();
		$this->handleDeleteMany($ids, $blogComment);
	}

	public function deleteBlogCommentReply()
	{
		global $app;
		$ids = $app['prs']['id'];
		$blogCommentReply = new book_group_comment_reply_model();
		$this->handleDeleteMany($ids, $blogCommentReply);
	}

	public function changeStatusManyBlogComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$blogComment = new review_rating_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $blogComment);
	}

	public function changeStatusManyBlogCommentReply()
	{
		global $app;
		$ids = $app['prs']['id'];
		$blogCommentReply = new book_group_comment_reply_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $blogCommentReply);
	}


	// /////////////////////////////////////////////////////////////////////////////////////////////////
	public function deleteBookGroupCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new book_group_category_model();
		$this->handleDeleteMany($ids, $category);
		$article = new book_group_article_model();
		$article->setToUnknownCategories($ids);
	}

	public function deleteBookGroupArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_group_article_model();
		$this->handleDeleteMany($ids, $article);
	}

	public function deleteBookGroupArticleBook()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_group_article_book_model();
		$this->handleDeleteMany($ids, $article);
	}

	public function deleteBookGroupArticleUser()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_group_article_user_model();
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

	public function changeStatusBookGroupArticle()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new book_group_article_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $article);
	}

	public function changeStatusBookGroupCategory()
	{
		global $app;
		$id = $app['prs']['id'];
		$category = new book_group_category_model();
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

	public function changeStatusManyBookGroupCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new book_group_category_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $category);
	}

	public function changeStatusManyBookGroupArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_group_article_model();
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