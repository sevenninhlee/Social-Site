<?php

class queries_controller extends vendor_backend_controller {
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
		$queries = new queries_category_model();
		$this->records = $queries->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->noActives = $queries->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}


	public function category_add(){
		global $app;
		$name = $app['prs']['name'];
		$slug = $app['prs']['slug'];
		$category = new queries_category_model();
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
		$category = new queries_category_model();
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

	//----------------------BLOG comment-------------------------------------------------------------------
	public function comment_replies($id){
		global $app;
		$review_rating = new review_rating_model();
		$this->records = $review_rating->getAllCommentsReplies($id['1']);
		http_response_code(200);
		echo json_encode($this->records);
	}

	//-----------------------BLOG---------------------------------------------------------------------------

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
		if(isset($app['prs']['featured_queries'])){
			$featured_my_queries = $app['prs']['featured_queries'];
			if($featured_my_queries != 'all')
			$conditions .= (($conditions)? " AND ":"")." featured_my_queries=".$featured_my_queries;
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
			" queries_articles.slug like '%".$search."%' OR ".
			" description like '%".$search."%')";
		}

		$conditionsTmp = $conditions;
		$user = new user_model();
		$this->users = $user->getAllRecords('*', ['conditions'=>'']);
		$queriesCategory = new queries_category_model();
		$this->categories = $queriesCategory->getAllRecords('*', ['conditions'=>'']);
		$queries_article = new queries_article_model();
		$this->records = $queries_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['user', 'queries_category'], 'order'=>'created DESC']);
		foreach ($this->records['data'] as $key => $record) {
			$this->records['data'][$key]['ListCate'] = $queriesCategory->getCatOfQueries($record['categories_arr']);
		}
		$this->noActives = $queries_article->getCountRecords(['conditions'=>'admin_status=1']);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new queries_article_model();
			$queriesData = $_POST['queries'];
			$queriesData = string_helper_model::processForm($queriesData);
			$queriesData['user_id'] = $_SESSION['user']['id'];
			if(isset($_POST['categories_arr'])){
				$queriesData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$queriesData['categories_arr'] = ',0,';
			}
			$queriesData['categories_id'] = 1;
			if($_FILES['image']['tmp_name'])
				$queriesData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($queriesData);
			if($valid['status']) {
				if($bm->addRecord($queriesData))
					header("Location: ".vendor_app_util::url(["ctl"=>"queries"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $queriesData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $queriesData;
			}
		}

		$conditions = '';
		$queries = new queries_category_model();
		$this->categories = $queries->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}
	//--------------------------------------------------------------------------

	public function view($id) {
		$conditions = '';
		$queries = new queries_category_model();
		$this->categories = $queries->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new queries_article_model();
		$this->record = $bm->getRecord($id);
		$this->category = $queries->getRecord($this->record['categories_id']);
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'query_article_model');
		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "query_article_model");
		$this->display();
	}

	public function edit($id) {
		$conditions = '';
		$queries = new queries_category_model();
		$this->categories = $queries->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new queries_article_model();
		$this->record = $bm->getRecord($id);
		// $this->category = $queries->getRecord($this->record['categories_id']);
		$this->category = $queries->getCatOfQueries($this->record['categories_arr']);
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'query_article_model');
		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "query_article_model");

		if(isset($_POST['btn_submit'])) {
			$queriesData = $_POST['queries'];
			if(isset($_POST['categories_arr'])){
				$queriesData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$queriesData['categories_arr'] = ',0,';
			}
			$queriesData['categories_id'] = 1;			
			$queriesData = string_helper_model::processForm($queriesData);
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$queriesData['featured_image'] = $this->uploadImg($_FILES);
			}

			$valid = $bm->validator($queriesData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $queriesData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"queries"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $queriesData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $queriesData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusQueryComment()
	{
		global $app;
		$id = $app['prs']['id'];
		$comment = new review_rating_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $comment);
	}

	public function deleteQueryComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$queriesComment = new review_rating_model();
		$this->handleDeleteMany($ids, $queriesComment);
	}

	public function changeStatusManyQueryComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$queriesComment = new review_rating_model();
		$data = [
			'admin_status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $queriesComment);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusQueryArticle()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new queries_article_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $article, $notify = true);
	}

	public function changeStatusQueryCategory()
	{
		global $app;
		$id = $app['prs']['id'];
		$category = new queries_category_model();
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $category);
	}

	public function changeStatus($id, $dataRecord, $model, $notify = false) {
		if($model->editRecord($id, $dataRecord)){
			if($dataRecord['admin_status'] == 1 && $notify == true) {
				$queryData = $model->getRecord($id);
				$um = new user_model();
				$user = $um->getRecord($queryData['user_id']);
				$notify = new notify_content_model();
				if(strlen($queryData['title']) > 15) {
					$queryData['title'] = substr($queryData['title'], 0, 15).'...';
				}
				if($queryData['owner_status'] == 1) {	
					$dataNotifies = [
						[
							'user_id' => $user['id'],
							'description' => 'Your post('.$queryData['title'].') has approved',
							'action_id' => 3,
							'link' => 'queries',
						],
						[
							'user_id' => $user['id'],
							'description' => ucwords($user['firstname']).' '.ucwords($user['lastname']).' created a new post ('.$queryData['title'].') ',
							'action_id' => 1,
							'link' => 'queries',
						]
					];
					foreach ($dataNotifies as $dataNotifie) {
						$notify->addRecord($dataNotifie);
					}
				} else {
					$dataNotifie = [
						'user_id' => $user['id'],
						'description' => 'Your post('.$queryData['title'].') has approved',
						'action_id' => 3,
						'link' => 'queries'
					];
					$notify->addRecord($dataNotifie);
				}
				
			}
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

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function deleteQueryCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new queries_category_model();
		$this->handleDeleteMany($ids, $category);
		$category = new queries_article_model();
		$category->setToUnknownCategories($ids);
	}

	public function deleteQueryArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new queries_article_model();
		$this->handleDeleteMany($ids, $article);
	}

	public function handleDeleteMany($ids, $model) {
		if ($model->delRelativeRecords($ids, null, $this->controller)){
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

	public function changeStatusManyQueryCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new queries_category_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $category);
	}

	public function changeStatusManyQueryArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new queries_article_model();
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