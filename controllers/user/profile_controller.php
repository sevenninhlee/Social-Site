<?php
class profile_controller extends aside_bar_data_controller
{
	public function index() 
	{
		$user_id = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$this->isLogged = $this->isUserLogged;
		$status_name = 'owner_status';
		$um = new user_model();
		$this->user = $um->getRecord($user_id);		
		$review_model = new review_rating_model();
		$this->book_reviews 	 = $review_model->getReviews('book_article_model',$user_id, 'book_articles', $status_name);
		$action_model = new action_model();
		$this->book_recommendeds = $action_model->getActions('book_article_model',$user_id, 'book_articles', 'recommanded', $status_name);
		$this->book_currents 	 = $action_model->getActions('book_article_model',$user_id, 'book_articles', 'current', $status_name);
		$bm = new blog_article_model();
		$items = $bm->getAllRecords('*', ['conditions'=>'owner_status=1 and admin_status=1 and user_id='.$user_id, 'order'=>'id DESC limit 1']);
		if(isset($items))foreach($items as $item){
			$this->latest_blog = $item['title'];
		} else $this->latest_blog = "None";
		$this->book_favorites 	 = $action_model->getActions('book_article_model',$user_id, 'book_articles', 'favorite', $status_name);
		$bulletin_model = new bulletin_model();
		$bulletins 	 = $bulletin_model->getAllRecords('*', ['conditions'=> "user_id={$user_id} and owner_status=1 and admin_status=1", 'order'=>'id DESC limit 1']);

		if(isset($bulletins))foreach($bulletins as $item){
			$this->bulletin = $item['content'];
		} else $this->bulletin = "None";

		$notiAction = new notify_action_model();
		$this->notiActions = $notiAction->all('*',['conditions'=>' action in (1,2,3,4,5) AND user_id = '.$user_id, 'joins'=>false, 'order'=> ' action ASC ']);
		$this->emailActions = $notiAction->all('*',['conditions'=>' action in (6,7,8,9,10) AND user_id = '.$user_id, 'joins'=>false, 'order'=> ' action ASC ']);
		if(isset($_POST['btn_save_submit'])) {
			$datas = $_POST['action'];
			if(empty($this->notiActions)) {
				foreach ($datas as $key => $value) {
					if($key < 6){
						$notiActionData = [
							'user_id' => $user_id,
							'action' => $key,
							'status' => $value
						];
						if($notiAction->addRecord($notiActionData)){
							header("Location: ".vendor_app_util::url(["ctl"=>"profile", "act"=>"index"]));
						}	
					}
				}
			} else {
				foreach ($datas as $key => $value) {
					if($key < 6){
						$getNotiAction = $notiAction->getRecordWhere([
							'user_id' => $user_id,
							'action' => $key,
						]);
						$notiActionData = [
							'status' => $value
						];
						if($notiAction->editRecord($getNotiAction['id'], $notiActionData)){
							header("Location: ".vendor_app_util::url(["ctl"=>"profile", "act"=>"index"]));
						}
					}
				}
			}
			if(empty($this->emailActions)) {
				foreach ($datas as $key => $value) {
					if($key >= 6){
						$notiActionData = [
							'user_id' => $user_id,
							'action' => $key,
							'status' => $value
						];
						if($notiAction->addRecord($notiActionData)){
							header("Location: ".vendor_app_util::url(["ctl"=>"profile", "act"=>"index"]));
						}	
					}
				}
			} else {
				foreach ($datas as $key => $value) {
					if($key >= 6){
						$getNotiAction = $notiAction->getRecordWhere([
							'user_id' => $user_id,
							'action' => $key,
						]);
						$notiActionData = [
							'status' => $value
						];
						if($notiAction->editRecord($getNotiAction['id'], $notiActionData)){
							header("Location: ".vendor_app_util::url(["ctl"=>"profile", "act"=>"index"]));
						}
					}
				}
			}
		}
		$this->display();
	} 

	public function edit(){
		$um = new user_model();
		$id = $_SESSION['user']['id'];
		if(isset($_POST['firstname'])){
			$userData['firstname'] = $_POST['firstname'];
		}else if(isset($_POST['lastname'])){
			$userData['lastname'] = $_POST['lastname'];
		}else if(isset($_POST['username'])){
			$userData['username'] = $_POST['username'];
		}else if(isset($_POST['datebirth'])){
			$userData['datebirth'] = $_POST['datebirth'];
		}else if(isset($_POST['gender'])){
			$userData['gender'] = $_POST['gender'];
		}else if(isset($_POST['country'])){
			$userData['country'] = $_POST['country'];
		}else if(isset($_POST['website'])){
			$userData['website'] = $_POST['website'];
		}else if(isset($_POST['interest'])){
			$userData['interest'] = $_POST['interest'];
		}else if(isset($_POST['favorite_book'])){
			$userData['favorite_book'] = $_POST['favorite_book'];
		}else if(isset($_POST['bulletin'])){
			$userData['bulletin'] = $_POST['bulletin'];
		}else if(isset($_POST['notifies'])){
			$userData['notifies'] = $_POST['notifies'];
		}else if(isset($_POST['latest-blog'])){
			$userData['latest_blog'] = $_POST['latest-blog'];
		}

		if($um->editRecord($id,$userData)) {
			$valid = [
				'status' => true,
				'data' => 'Edit profile successfully'
			];
			http_response_code(200);
			echo json_encode($valid);
		} else {
			$valid = [
				'status' => false,
				'errors' => ['data' => 'Error while edit profile !']
			];
			http_response_code(400);
			echo json_encode($valid);
		}
	}

	public function editAvatar(){
		$um = new user_model();
		$user['avata'] = $_POST['avata'];
		$id = $_SESSION['user']['id'];
		if(isset($user['avata'])){
			list($type, $imageData) = explode(';', $user['avata']);
			list(,$extension) = explode('/',$type);
			list(,$imageData)      = explode(',', $imageData);
			$fileName = uniqid().'.'.$extension;
			$ulfd = RootURI.UploadREL .'users/';
			if (!file_exists($ulfd))
			mkdir($ulfd, 0777, true);  //create directory if not exist
			$imageData = base64_decode($imageData);
			file_put_contents($ulfd.$fileName, $imageData);
			$userData['avata'] = $fileName;
		}else
		$userData['avata'] = 'empty.jpg';


		if($um->editRecord($id,$userData)) {
			$valid = [
				'status' => true,
				'data' => 'Edit profile successfully'
			];
			http_response_code(200);
			echo json_encode($valid);
		} else {
			$valid = [
				'status' => false,
				'errors' => ['data' => 'Error while edit profile !']
			];
			http_response_code(400);
			echo json_encode($valid);
		}
	}

	public function changeShowName() {
		$um = new user_model();
		$show_name = $_POST['status'];
		$id = $_SESSION['user']['id'];
		$userData['show_name'] = $show_name;
		// echo "Start <br/>"; echo '<pre>'; print_r($id);echo '</pre>';exit("End Data");

		if($um->editRecord($id,$userData)) {
			$valid = [
				'status' => true,
				'data' => 'Edit profile successfully'
			];
			http_response_code(200);
			echo json_encode($valid);
		} else {
			$valid = [
				'status' => false,
				'errors' => ['data' => 'Error while edit profile !']
			];
			http_response_code(400);
			echo json_encode($valid);
		}
	} 
		
	public function invite(){
		$user_id = $_SESSION['user']['id'];
		$email = $_POST['email'];
		if ($email == "") {
			$data = [
				'status' => 0,
				'message' => "Email requiered!"
			];
			http_response_code(200);
			echo json_encode($data); 
		} else {
			$um = new user_model();
			$checkUser = $um->getRecordWhere(['email' => $email]);
			if (!$checkUser || $email == $_SESSION['user']['email']) {

				$mTo = $email;
				$title = 'Invite to join Enlight21';
				$href = RootURL."register";
						
				$content = "
				<h3>This is an invitation to join Enlight21 from ".vendor_html_helper::showUserName($_SESSION['user']).".</h3>
				<p>Please <a target='_blank' href='".$href."'>click here </a> to register.</p>
				";
				$nTo = 'Village ties';
				
				if (vendor_app_util::sendMail($title, $content, $nTo, $mTo)) {
					$data = [
						'status' => 1,
						'data' => $email,
					];
		
					http_response_code(200);
					echo json_encode($data);
				} else {
					$this->errors = ['database'=>'An error occurred when send request data! '. $bm->errors['message']];
					$data = [
						'status' => 0,
						'data' => $this->errors
					];
					http_response_code(501);
					echo json_encode($data);
				}
				
			} else {
				$frm = new friend_model();
				$checkFried = $frm->getRecordWhere(['user_id' => $user_id, 'user_id_friend'=> $checkUser['id'], 'approved'=> 1]);
				$checkFried1 = $frm->getRecordWhere(['user_id' => $checkUser['id'] , 'user_id_friend'=> $user_id , 'approved'=> 1]);
				$checkFried2 = $frm->getRecordWhere(['user_id' => $user_id , 'user_id_friend'=> $checkUser['id'] , 'approved'=> 0]);
				if ($checkFried || $checkFried1) {
					$data = [
						'status' => 0,
						'message' => "Already a friend!"
					];
					http_response_code(200);
					echo json_encode($data); exit();
				}

				if ($checkFried2) {
					$data = [
						'status' => 0,
						'message' => "You sent the request!"
					];
					http_response_code(200);
					echo json_encode($data); exit();
				}

				//##### SEND MAIL #############################################################
				//##### $mainReceiver: Nguoi nhan email chinh
				//#####	$mainReceiverText: Ten nguoi nhan email chinh
				//#####	$cc: Nguoi duoc CC, thay nhung nguoi khac
				//#####	$subject: Ten chu de cua email
				//#####	$content: Noi dung
				//#############################################################################
				$user_requested = $um->getRecordWithSetting($checkUser['id']);
				$mainReceiver = $email;
				$subject="Request friend";
				$mainReceiverText = 'Enlight21';
				$cc = '';
				$href = RootURL."user/friends/index?user=".$checkUser['id'];
				$content = "
				<h3>You just received a friend invitation from ".vendor_html_helper::showUserName($_SESSION['user']).".</h3>
				<p>Please <a target='_blank' href='".$href."'>click here </a> to approve the friend.</p>
				";
				if($user_requested['is_disabled_all_email'] == '0' && $user_requested['is_email_friend_request'] == '1')
				vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
				//########## SEND MAIL ########################################################


				$friendData['user_id'] = $user_id;
				$friendData['user_id_friend'] = $checkUser['id'];
				$friendData['approved'] = 0;
				if( $id = $frm->addRecord($friendData)){
					$friendData = $frm->getRecord($id);
					$data = [
						'status' => 1,
						'data' => $friendData
					];
		
					$notify = new notify_content_model();
					$dataNotifie = [
							'user_id' => $checkUser['id'],
							'description' => vendor_html_helper::showUserName($_SESSION['user']).' has requested add friend',
							'action_id' => 2,
							'link' => 'user/friends/index',
					];
					$notify->addRecord($dataNotifie);
		
					http_response_code(200);
					echo json_encode($data);
				} else {
					$this->errors = ['database'=>'An error occurred when send request data! '. $bm->errors['message']];
					$data = [
						'status' => 0,
						'data' => $this->errors
					];
					http_response_code(501);
					echo json_encode($data);
				}

			}
		}
	}
    
}
?>