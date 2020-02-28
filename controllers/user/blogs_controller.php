<?php
class blogs_controller extends aside_bar_data_controller
{
	public function __construct()
	{
		$category_model = new blog_category_model();
		$this->dataCategories = $category_model->all('*',['conditions'=>'', 'joins'=>false, 'order'=> ' name ASC ']);
		parent::__construct();
	}
	
	public function index()
	{
		$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$conditionsTmp = "user_id = {$userID}";
		$blog_article = new blog_article_model();
		$blogCategory = new blog_category_model();
		$this->records = $blog_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['blog_category'], 'order'=>'created DESC']);
		foreach($this->records['data'] as $key => $record) {
			$um = new user_model();
			$user = $um->getRecord($record['user_id']);
			$this->records['data'][$key]['username'] = $user['show_name'] == 0 ? $user['firstname'].' '.$user['lastname'] :$user['username'];
			$this->records['data'][$key]['ListCate'] = $blogCategory->getCatOfBolog($record['categories_arr']);
		}
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new blog_article_model();
			$blogData = $_POST['blog'];
			$blogData['user_id'] = $_SESSION['user']['id'];
			$blogData['admin_status'] = 0;
			if(isset($_POST['categories_arr'])){
				$blogData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$blogData['categories_arr'] = ',0,';
			}
			$blogData['categories_id'] = 1;
			$blogData['slug'] = vendor_app_util::gen_slug($blogData['title']);
			if($_FILES['image']['tmp_name'])
				$blogData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($blogData);
			if($valid['status']) {
				if($bm->addRecord($blogData)){

					if($blogData['featured_my_blog'] == '1'){
						//##### SEND MAIL #############################################################
						//##### $mTo: Nguoi nhan email chinh
						//#####	$nTo: Ten nguoi nhan email chinh
						//#####	$from: Nguoi duoc CC, thay nhung nguoi khac
						//#####	$title: Ten chu de cua email
						//#####	$content: Noi dung
						//#####
						//#####
						//#############################################################################
						$user_model = new user_model();
						$users_friend = $user_model->getListFriend();
						$cc = "";
						$mainReceiver = "";
						foreach ($users_friend['data'] as $key => $value) {
							if($key != 0 ) $mainReceiver .= ','.$value['email'];
							else $mainReceiver .= $value['email'];
						}
						$href = RootURL."blogs/".$blogData['slug'];
						$subject="Englight21: New post from your friend - ".ucwords($_SESSION['user']['firstname']).' '.ucwords($_SESSION['user']['lastname']);
						$mainReceiverText = 'Englight21';
						$content = "<h3>Your friend has just posted a new post, check detail at: ".$href."</h3>";
						vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
						//########## SEND MAIL ########################################################
					}

					$notify = new notify_content_model();
					$dataNoti = [
						'user_id' => $_SESSION['user']['id'],
						'description' => 'A post has created by '.$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'],
						'action_id' => 0,
						'link' => 'admin/blogs/index',
					];
					if ($notify->addRecord($dataNoti) )
						header("Location: ".vendor_app_util::url(["ctl"=>"blogs"]));
				}else {
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

	public function edit($id) {
		$bm = new blog_article_model();
		$this->record = $bm->getRecord($id);
		$conditions = '';
		$blog = new blog_category_model();
		$this->categories = $blog->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->category = $blog->getCatOfBolog($this->record['categories_arr']);
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

	public function changeOwnerStatus()
	{
		$blog_article = new blog_article_model();
		$dataRecord = [
			'owner_status' => $_POST['owner_status']
		];
		if($blog_article->editRecord($_POST['blog_article'], $dataRecord)){
			$data = [
				'status' => 1,
				'message' => 'Change status successful!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => 0,
				'error' => 'An error occurred when Edit data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

	public function changeFeaturedMyBlog()
	{
		$blog_article = new blog_article_model();
		$dataRecord = [
			'featured_my_blog' => $_POST['featured_my_blog']
		];
		if($blog_article->editRecord($_POST['blog_article'], $dataRecord)){
			$data = [
				'status' => 1,
				'message' => 'Change status successful!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => 0,
				'error' => 'An error occurred when Edit data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}
}
?>