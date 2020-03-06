<?php

class blogs_controller extends vendor_backend_controller {
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
		$blog = new blog_category_model();
		$this->records = $blog->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->noActives = $blog->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}

	public function category_add(){
		global $app;
		$name = $app['prs']['name'];
		$slug = $app['prs']['slug'];
		$category = new blog_category_model();
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
		$category = new blog_category_model();
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
		if(isset($app['prs']['featured_blog'])){
			$featured_my_blog = $app['prs']['featured_blog'];
			if($featured_my_blog != 'all')
			$conditions .= (($conditions)? " AND ":"")." featured_my_blog=".$featured_my_blog;
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
			" blog_articles.slug like '%".$search."%' OR ".
			" description like '%".$search."%')";
		}

		$conditionsTmp = $conditions;
		$user = new user_model();
		$this->users = $user->getAllRecords('*', ['conditions'=>'']);
		$blogCategory = new blog_category_model();
		$this->categories = $blogCategory->getAllRecords('*', ['conditions'=>'']);
		$blog_article = new blog_article_model();
		$this->records = $blog_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['user'], 'order'=>'created DESC']);
		foreach ($this->records['data'] as $key => $record) {
			$this->records['data'][$key]['ListCate'] = $blogCategory->getCatOfBolog($record['categories_arr']);
		}
		$this->noActives = $blog_article->getCountRecords(['conditions'=>'admin_status=1']);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new blog_article_model();
			$blogData = $_POST['blog'];
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
					header("Location: ".vendor_app_util::url(["ctl"=>"blogs"]));
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
		$blog = new blog_category_model();
		$this->categories = $blog->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}
	//--------------------------------------------------------------------------

	public function view($id) {
		$conditions = '';
		$blog = new blog_category_model();
		$this->categories = $blog->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new blog_article_model();
		$this->record = $bm->getRecord($id);
		$this->category = $blog->getRecord($this->record['categories_id']);

		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'blog_article_model');

		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "blog_article_model");
		$this->display();
	}

	public function edit($id) {
		$conditions = '';
		$blog = new blog_category_model();
		$this->categories = $blog->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new blog_article_model();
		$this->record = $bm->getRecord($id);
		$this->category = $blog->getCatOfBolog($this->record['categories_arr']);
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'blog_article_model');

		$like = new like_model();
		$this->numLikes = $like->totalLike($id, "blog_article_model");
		if(isset($_POST['btn_submit'])) {
			$blogData = $_POST['blog'];
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
					header("Location: ".vendor_app_util::url(["ctl"=>"blogs"]));
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

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusBlogComment()
	{
		global $app;
		$id = $app['prs']['id'];
		$comment = new review_rating_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $comment);
	}

	public function deleteBlogComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$blogComment = new review_rating_model();
		$this->handleDeleteMany($ids, $blogComment);
	}

	public function changeStatusManyBlogComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$blogComment = new review_rating_model();
		$data = [
			'admin_status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $blogComment);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusBlogArticle()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new blog_article_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		if( $_POST['status'] == '1'){
			//##### SEND MAIL #############################################################
			//##### $mTo: Nguoi nhan email chinh
			//#####	$nTo: Ten nguoi nhan email chinh
			//#####	$from: Nguoi duoc CC, thay nhung nguoi khac
			//#####	$title: Ten chu de cua email
			//#####	$content: Noi dung
			//#####
			//#####
			//#############################################################################
			$blog = $article->getRecord($id);
			$user_model = new user_model();
			$userOwnerBlog = $user_model->getRecordWithSetting($blog['user_id']);
			$cc = "";
			$mainReceiver = $userOwnerBlog['email'];
			$subject="Englight21: Your post has been approved - ". $blog['title'];
			$mainReceiverText = 'Englight21';
			$href = RootURL."blogs/".$blog['slug'];
			$content = "<h3>Your post has just been approved, check detail at: ".$href."</h3>";
			if($userOwnerBlog['is_disabled_all_email'] == '0' && $userOwnerBlog['is_email_post_approved'] == '1')
			vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
			//########## SEND MAIL ########################################################
		}else{
			//##### SEND MAIL #############################################################
			//##### $mTo: Nguoi nhan email chinh
			//#####	$nTo: Ten nguoi nhan email chinh
			//#####	$from: Nguoi duoc CC, thay nhung nguoi khac
			//#####	$title: Ten chu de cua email
			//#####	$content: Noi dung
			//#####
			//#####
			//#############################################################################
			$blog = $article->getRecord($id);
			$user_model = new user_model();
			$userOwnerBlog = $user_model->getRecordWithSetting($blog['user_id']);
			$cc = "";
			$mainReceiver = $userOwnerBlog['email'];
			$subject="Englight21: Your post has been rejected - ". $blog['title'];
			$mainReceiverText = 'Englight21';
			$href = RootURL."blogs/".$blog['slug'];
			$content = "<h3>Your post has just been rejected, check detail at: ".$href."</h3>";
			if($userOwnerBlog['is_disabled_all_email'] == '0' && $userOwnerBlog['is_email_post_approved'] == '1')
			vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
			//########## SEND MAIL ########################################################
		}
		$this->changeStatus($id, $data, $article, $notify = true);
	}

	public function changeStatusBlogCategory()
	{
		global $app;
		$id = $app['prs']['id'];
		$category = new blog_category_model();
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $category);
	}

	public function changeStatus($id, $dataRecord, $model, $notify = false) {
		if($model->editRecord($id, $dataRecord)){
			$data = [
				'status' => true,
				'message' => 'Change status successful!'
			];
			if($dataRecord['admin_status'] == 1 && $notify == true) {
				$blogData = $model->getRecord($id);
				$um = new user_model();
				$user = $um->getRecord($blogData['user_id']);
				$notify = new notify_content_model();
				if(strlen($blogData['title']) > 15) {
					$blogData['title'] = substr($blogData['title'], 0, 15).'...';
				}
				if($blogData['owner_status'] == 1) {	
					$dataNotifies = [
						[
							'user_id' => $user['id'],
							'description' => 'Your post('.$blogData['title'].') has approved',
							'action_id' => 3,
							'link' => 'blogs',
						],
						[
							'user_id' => $user['id'],
							'description' => ucwords($user['firstname']).' '.ucwords($user['lastname']).' created a new post ('.$blogData['title'].') ',
							'action_id' => 1,
							'link' => 'blogs',
						]
					];
					foreach ($dataNotifies as $dataNotifie) {
						$notify->addRecord($dataNotifie);
					}
				} else {
					$dataNotifie = [
						'user_id' => $user['id'],
						'description' => 'Your post('.$blogData['title'].') has approved',
						'action_id' => 3,
						'link' => 'blogs'
					];
					$notify->addRecord($dataNotifie);
				}
			}

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
	public function deleteBlogCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new blog_category_model();
		$this->handleDeleteMany($ids, $category);
		$category = new blog_article_model();
		$category->setToUnknownCategories($ids);
	}

	public function deleteBlogArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new blog_article_model();
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

	public function changeStatusManyBlogCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new blog_category_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $category);
	}

	public function changeStatusManyBlogArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new blog_article_model();
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