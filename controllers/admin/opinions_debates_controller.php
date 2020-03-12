<?php

class opinions_debates_controller extends vendor_backend_controller {
	public function categories() {    
		global $app;
		$conditions = "";
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
		}
		if(isset($app['prs']['search'])){
			$conditions .= (($conditions)? " AND (":"(").
			" name like '%".$app['prs']['search']."%')";
		}
		$opinion_debate = new opinion_debate_category_model();
		$this->records = $opinion_debate->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->noActives = $opinion_debate->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}


	public function category_add(){
		global $app;
		$name = $app['prs']['name'];
		$slug = $app['prs']['slug'];
		$category = new opinion_debate_category_model();
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
		$category = new opinion_debate_category_model();
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
		if(isset($app['prs']['featured_opinion_debate'])){
			$featured_my_opinion_debate = $app['prs']['featured_opinion_debate'];
			if($featured_my_opinion_debate != 'all')
			$conditions .= (($conditions)? " AND ":"")." featured_my_opinion_debate=".$featured_my_opinion_debate;
		}
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." admin_status=".($status=='active'?1:0);
		}
		if(isset($app['prs']['search'])){
			$conditions .= (($conditions)? " AND (":"(").
			" title like '%".$app['prs']['search']."%' OR ".
			" opinion_debate_articles.slug like '%".$app['prs']['search']."%' OR ".
			" description like '%".$app['prs']['search']."%')";
		}

		$conditionsTmp = $conditions;
		$user = new user_model();
		$this->users = $user->getAllRecords('*', ['conditions'=>'']);
		$opinion_debateCategory = new opinion_debate_category_model();
		$this->categories = $opinion_debateCategory->getAllRecords('*', ['conditions'=>'']);
		$opinion_debate_article = new opinion_debate_article_model();
		$this->records = $opinion_debate_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['user'], 'order'=>'created DESC']);
		foreach ($this->records['data'] as $key => $record) {
			$this->records['data'][$key]['ListCate'] = $opinion_debateCategory->getCatOfOpinion($record['categories_arr']);
		}
		$this->noActives = $opinion_debate_article->getCountRecords(['conditions'=>'admin_status=1']);

		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new opinion_debate_article_model();
			$opinion_debateData = $_POST['opinion_debate'];
			$opinion_debateData['user_id'] = $_SESSION['user']['id'];
			if(isset($_POST['categories_arr'])){
				$opinion_debateData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$opinion_debateData['categories_arr'] = ',0,';
			}
			$opinion_debateData['categories_id'] = 1;
			if($_FILES['image']['tmp_name'])
				$opinion_debateData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($opinion_debateData);
			if($valid['status']) {
				if($bm->addRecord($opinion_debateData))
					header("Location: ".vendor_app_util::url(["ctl"=>"opinions_debates"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $opinion_debateData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $opinion_debateData;
			}
		}

		$conditions = '';
		$opinion_debate = new opinion_debate_category_model();
		$this->categories = $opinion_debate->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}
	//--------------------------------------------------------------------------

	public function view($id) {
		$conditions = '';
		$opinion_debate = new opinion_debate_category_model();
		$this->categories = $opinion_debate->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new opinion_debate_article_model();
		$this->record = $bm->getRecord($id);
		$this->category = $opinion_debate->getRecord($this->record['categories_id']);

		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'opinion_debate_article_model');

		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "opinion_debate_article_model");
		$this->display();
	}

	public function edit($id) {
		$conditions = '';
		$opinion_debate = new opinion_debate_category_model();
		$this->categories = $opinion_debate->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new opinion_debate_article_model();
		$this->record = $bm->getRecord($id);
		// $this->category = $opinion_debate->getRecord($this->record['categories_id']);
		$this->category = $opinion_debate->getCatOfOpinion($this->record['categories_arr']);
		
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'opinion_debate_article_model');

		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "opinion_debate_article_model");

		if(isset($_POST['btn_submit'])) {
			$opinion_debateData = $_POST['opinion_debate'];
			if(isset($_POST['categories_arr'])){
				$opinion_debateData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$opinion_debateData['categories_arr'] = ',0,';
			}
			$opinion_debateData['categories_id'] = 1;
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$opinion_debateData['featured_image'] = $this->uploadImg($_FILES);
			}
			$valid = $bm->validator($opinion_debateData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $opinion_debateData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"opinions_debates"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $opinion_debateData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $opinion_debateData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusOpinionsDebatesComment()
	{
		global $app;
		$id = $app['prs']['id'];
		$comment = new review_rating_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $comment);
	}

	public function deleteOpinionsDebatesComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$opinion_debateComment = new review_rating_model();
		$this->handleDeleteMany($ids, $opinion_debateComment);
	}

	public function changeStatusManyOpinionsDebatesComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$opinion_debateComment = new review_rating_model();
		$data = [
			'admin_status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $opinion_debateComment);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusOpinionsDebatesArticle()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new opinion_debate_article_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $article, $notify = true);
	}

	public function changeStatusOpinionsDebatesCategory()
	{
		global $app;
		$id = $app['prs']['id'];
		$category = new opinion_debate_category_model();
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $category);
	}

	public function changeStatus($id, $dataRecord, $model, $notify = false) {
		if($model->editRecord($id, $dataRecord)){
			if($dataRecord['admin_status'] == 1 && $notify == true) {
				$opinionData = $model->getRecord($id);
				$um = new user_model();
				$user = $um->getRecord($opinionData['user_id']);
				$notify = new notify_content_model();

				if(strlen($opinionData['title']) > 15) {
					$opinionData['title'] = substr($opinionData['title'], 0, 15).'...';
				}
				if($opinionData['owner_status'] == 1) {	
					$dataNotifies = [
						[
							'user_id' => $user['id'],
							'description' => 'Your post('.$opinionData['title'].') has approved',
							'action_id' => 3,
							'link' => 'opinions_debates',
						],
						[
							'user_id' => $user['id'],
							'description' => vendor_html_helper::showUserName($user).' created a new post ('.$opinionData['title'].') ',
							'action_id' => 1,
							'link' => 'opinions_debates',
						]
					];
					foreach ($dataNotifies as $dataNotifie) {
						$notify->addRecord($dataNotifie);
					}
				} else {
					$dataNotifie = [
						'user_id' => $user['id'],
						'description' => 'Your post('.$opinionData['title'].') has approved',
						'action_id' => 3,
						'link' => 'opinions_debates'
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
	public function deleteOpinionsDebatesCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new opinion_debate_category_model();
		$this->handleDeleteMany($ids, $category);
		$category = new opinion_debate_article_model();
		$category->setToUnknownCategories($ids);
	}

	public function deleteOpinionsDebatesArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new opinion_debate_article_model();
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

	public function changeStatusManyOpinionsDebatesCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new opinion_debate_category_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $category);
	}

	public function changeStatusManyOpinionsDebatesArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new opinion_debate_article_model();
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