<?php
class friends_controller extends aside_bar_data_controller
{
	public function index()
	{
		$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$conditionsTmp = "(user_id = {$userID} OR  user_id_friend = {$userID})";
		$friend = new friend_model();
		$this->records = $friend->allp('*',['conditions'=>$conditionsTmp, 'order'=>'updated DESC']);
		$user_model = new user_model();
		$this->user = $user_model->getRecord($userID);
		// $this->isUserLogged = false;
		// if(isset($_SESSION) && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) $this->isUserLogged = true;
		foreach ($this->records['data'] as $key => $value) {
			# code...
			$userIDFriend = ($value['user_id'] == $userID)?$value['user_id_friend']:$value['user_id'];
			
			$user = $user_model->getRecord($userIDFriend);
			$this->records['data'][$key]['username'] = vendor_html_helper::showUserName($user);
			$this->records['data'][$key]['user_id_friend'] = $userIDFriend;
			$this->records['data'][$key]['status_user_admin'] = ($value['user_id'] == $userID)?$value['status_user']:$value['status_user_friend'];
			$this->records['data'][$key]['user_avatar'] = $user['avata'];
		}
		$this->records['numFriend'] = $friend->getCountRecords(['conditions'=>$conditionsTmp.' and approved=1']);
		if(isset($_SESSION['user'])) $this->records['numNotApprove'] = $friend->getCountRecords(['conditions'=>'user_id_friend = '.$_SESSION['user']['id'].' and approved=0']);
		$this->display();
	}

	public function sendRequest() {
		$friend = new friend_model();	
		$friendData['user_id'] = $_SESSION['user']['id'];
		$friendData['user_id_friend'] = $_POST['user_id_friend'];
		if ( $friend->getRecordWhere(['user_id'=>$friendData['user_id'], 'user_id_friend'=>$friendData['user_id_friend']]) && $friend->getRecordWhere(['user_id'=>$friendData['user_id_friend'], 'user_id_friend'=>$friendData['user_id']])){
			$this->errors = ['database'=>'An error occurred when send request data! '. $friend->errors['message']];
			$data = [
				'status' => false,
				'data' => $this->errors
			];
			http_response_code(501);
			echo json_encode($data);
		}
	
		else if( $id = $friend->addRecord($friendData)){
			$friendData = $friend->getRecord($id);
			$data = [
				'status' => true,
				'data' => $friendData
			];

			$notify = new notify_content_model();
			$dataNotifie = [
					'user_id' => $_POST['user_id_friend'],
					'description' => vendor_html_helper::showUserName($_SESSION['user']).' has requested add friend',
					'action_id' => 2,
					'link' => 'user/friends/index',
			];
			$notify->addRecord($dataNotifie);

				$user_model = new user_model();
				$userReceiver = $user_model->getRecordWithSetting($_POST['user_id_friend']);
				if($userReceiver) $emailReceiver = $userReceiver['email'];
				else $emailReceiver = $_SESSION['user']['email'];

				//##### SEND MAIL #############################################################
				//##### $mainReceiver: Nguoi nhan email chinh
				//#####	$mainReceiverText: Ten nguoi nhan email chinh
				//#####	$cc: Nguoi duoc CC, thay nhung nguoi khac
				//#####	$subject: Ten chu de cua email
				//#####	$content: Noi dung
				//#############################################################################
				$mainReceiver = $emailReceiver;
				$subject="Request friend";
				$mainReceiverText = 'Enlight21';
				$cc = '';
				$href = RootURL."user/profile/index?user=".$_SESSION['user']['id'];
				$content = "
				<h3>You just received a friend invitation from ".vendor_html_helper::showUserName($_SESSION['user']).".</h3>
				<p>Please <a target='_blank' href='".$href."'>click here </a> to approve the friend.</p>
				";
				if($userReceiver['is_disabled_all_email'] == '0' && $userReceiver['is_email_friend_request'] == '1')
				vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
				//########## SEND MAIL ########################################################

			http_response_code(200);
			echo json_encode($data);
		}else {
			$this->errors = ['database'=>'An error occurred when send request data! '. $bm->errors['message']];
			$data = [
				'status' => false,
				'data' => $this->errors
			];
			http_response_code(501);
			echo json_encode($data);
		}
	}
	public function acceptRequest() {
		$friend = new friend_model();	
		$friendData['approved'] = 1;
		$user_id_friend = $_POST['user_id_friend'];
		$id = $friend->getRecordWhere(['user_id'=>$user_id_friend, 'user_id_friend'=>$_SESSION['user']['id']])['id'];
		if( $friend->editRecord($id, $friendData)){
			$data = [
				'status' => true,
				'data' => $friendData
			];

			http_response_code(200);
			echo json_encode($data);
		}else {
			$this->errors = ['database'=>'An error occurred when accept request data! '. $bm->errors['message']];
			$data = [
				'status' => false,
				'data' => $this->errors
			];
			http_response_code(501);
			echo json_encode($data);
		}
	}
	
	public function unFriend() {
		$friend = new friend_model();
		$user_id_friend = $_POST['user_id_friend'];
		$id1 = $friend->getRecordWhere(['user_id'=>$user_id_friend, 'user_id_friend'=>$_SESSION['user']['id']]);
		$id2 = $friend->getRecordWhere(['user_id_friend'=>$user_id_friend, 'user_id'=>$_SESSION['user']['id']]);
		$id = 0;
		if($id1) $id = $id1['id'];
		if($id2) $id = $id2['id'];
		if ($friend->delRelativeRecords($id, null, $this->controller)){
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

	public function approve() {
		$friend = new friend_model();
		$user_id_friend = $_POST['user_id_friend'];
		$id1 = $friend->getRecordWhere(['user_id'=>$user_id_friend, 'user_id_friend'=>$_SESSION['user']['id']]);
		$id2 = $friend->getRecordWhere(['user_id_friend'=>$user_id_friend, 'user_id'=>$_SESSION['user']['id']]);
		$id = 0;
		if($id1) $id = $id1['id'];
		if($id2) $id = $id2['id'];
		$friendData['approved'] = '1';
		if ($friend->editRecord($id, $friendData)){
			$data = [
				'status' => true,
				'message' => 'Delete successful!'
			];

			$user_model = new user_model();
			$userReceiver = $user_model->getRecordWithSetting($_POST['user_id_friend']);
			if($userReceiver) $emailReceiver = $userReceiver['email'];
			else $emailReceiver = $_SESSION['user']['email'];

			//##### SEND MAIL #############################################################
			//##### $mainReceiver: Nguoi nhan email chinh
			//#####	$mainReceiverText: Ten nguoi nhan email chinh
			//#####	$cc: Nguoi duoc CC, thay nhung nguoi khac
			//#####	$subject: Ten chu de cua email
			//#####	$content: Noi dung
			//#############################################################################
			$mainReceiver = $emailReceiver;
			$subject="Accepted friend";
			$mainReceiverText = 'Enlight21';
			$cc = '';
			$href = RootURL."user/profile/index?user=".$_SESSION['user']['id'];
			$content = "
			<h3>You have just been friend with ".vendor_html_helper::showUserName($_SESSION['user']).".</h3>
			<p>Please <a target='_blank' href='".$href."'>click here </a> to check the friend.</p>
			";
			if($userReceiver['is_disabled_all_email'] == '0' && $userReceiver['is_email_friend_request'] == '1')
			vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
			//########## SEND MAIL ########################################################

			$user_model = new user_model();
			$user = $user_model->getRecord($_SESSION['user']['id']);
			$notify = new notify_content_model();
			$dataNotifie = [
					'user_id' => $_POST['user_id_friend'],
					'description' => vendor_html_helper::showUserName($_SESSION['user']).' has confirmed friends with you',
					'action_id' => 6,
					'link' => 'user/friends/index',
			];
			$notify->addRecord($dataNotifie);

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

	public function changeStatus()
	{
		$friend = new friend_model();
		$user_id_friend = $_POST['user_id_friend'];
		$id1 = $friend->getRecordWhere(['user_id'=>$user_id_friend, 'user_id_friend'=>$_SESSION['user']['id']]);
		$id2 = $friend->getRecordWhere(['user_id_friend'=>$user_id_friend, 'user_id'=>$_SESSION['user']['id']]);
		$id = 0;
		$newStatus = $_POST['status'];
		if($id1){
			$id = $id1['id'];
			$friendData['status_user_friend'] = $newStatus;
		}
		if($id2){
			$id = $id2['id'];
			$friendData['status_user'] = $newStatus;
		}
		echo json_encode($friendData);
		if( $friend->editRecord($id, $friendData)){
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

	public static function helpFriend($checkfriend){  
		if( isset($checkfriend) && $checkfriend == 1) echo '<a class="f700 create-btn " user="'.$_GET['user'].'" act="">Friends</a>';
		else if( isset($checkfriend) && $checkfriend == 2) echo '<a class="f700 pull-right create-btn " user="'.$_GET['user'].'" act="">You sent a request</a>';
		else if( isset($checkfriend) && $checkfriend == 3) echo '<a class="f700 pull-right create-btn FriendAction" user="'.$_GET['user'].'" act="acceptRequest">Accept request</a>';
		else echo '<a class="f700 pull-right create-btn FriendAction" user="'.$_GET['user'].'" act="sendRequest">Add as a friend</a>';
	}
}
?>