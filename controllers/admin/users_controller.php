<?php

class users_controller extends vendor_backend_controller {
	public function index() {
		global $app;
		$conditions = "";
		if(isset($app['prs']['role'])) {
			$conditions .= (($conditions)? " AND ":"")."role=".$app['prs']['role'];
		}
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
		}
		if(isset($app['prs']['type'])){
			$type = $app['prs']['type'];
			if($type == 'admin' || $type == 'user')
			$conditions .= (($conditions)? " AND ":"")." role=".($type=='user'?2:1);
		}
		if(isset($app['prs']['gender'])){
			$gender = $app['prs']['gender'];
			if($gender == 'male' || $gender == 'female')
			$conditions .= (($conditions)? " AND ":"")." gender=".($gender=='male'?1:0);
		}
		if(isset($app['prs']['search'])){
			$conditions .= (($conditions)? " AND (":"(").
			" firstname like '%".$app['prs']['search']."%' OR ".
			" lastname like '%".$app['prs']['search']."%' OR ".
			" phone like '%".$app['prs']['search']."%' OR ".
			" email like '%".$app['prs']['search']."%' OR".
			" website like '%".$app['prs']['search']."%' OR".
			" address like '%".$app['prs']['search']."%' OR".
			" country like '%".$app['prs']['search']."%')";
		}

		$user = new user_model();
		$this->records = $user->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'created DESC']);
		$this->noActives = $user->getCountRecords(['conditions'=>'status=1']);
		$this->noAdmins = $user->getCountRecords(['conditions'=>'role=1']);
		$this->noMales = $user->getCountRecords(['conditions'=>'gender=1']);

		$this->display();
	}

	public function view($id) {
		$um = new user_model();
		$this->record = $um->getRecord($id);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$um = new user_model();
			$userData = $_POST['user'];
			if($_FILES['image']['tmp_name'])
				$userData['avata'] = $this->uploadImg($_FILES);
			$valid = $um->validator($userData);
			if($valid['status']) {
				$userData['password'] = vendor_app_util::generatePassword($userData['password']);
				if($um->addRecord($userData))
					header("Location: ".vendor_app_util::url(["ctl"=>"users"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $um->errors['message']];
					$this->record = $userData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->record = $userData;
			}
		}
		$this->display();
	}

	public function edit($id) {
		$um = new user_model();
		$this->record = $um->getRecord($id);
		if(isset($_POST['btn_submit'])) {
			$userData = $_POST['user'];
			if($_FILES['image']['tmp_name']) {
				if($this->record['avata'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['avata']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['avata']);
				$userData['avata'] = $this->uploadImg($_FILES);
			}

			$valid = $um->validator($userData, $id);
			if($valid['status']) {
				if($userData['password'])
					$userData['password'] = vendor_app_util::generatePassword($userData['password']);
				else
					unset($userData['password']);


				if($um->editRecord($id, $userData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"users"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $um->errors['message']];
					$this->record = $userData;
				}
			} else {
				$this->errors = $um::convertErrorMessage($valid['message']);
				$this->record = $userData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}



	public function profile() {
		$um = new user_model();
		$this->record = $um->getRecord($_SESSION['user']['id']);
		$this->display();
	}

	public function changepassword() {
		global $app;
		$curpassword = vendor_app_util::generatePassword($_POST['curpassword']);
		$um = new user_model();
		if( $um->checkOldPassword($curpassword)) {
			$newpassword 	= $_POST['newpassword'];
			$userData['password'] = vendor_app_util::generatePassword($newpassword);

			$id 		= $_SESSION['user']['id'];
			$password 	= $um->getAllRecordsLimit($id);
			if($um->editRecord($id, $userData))
				echo json_encode(['status'=>1, 'message'=>'Update successful!']);
			else echo json_encode(['status'=>0, 'message'=>'Have error when update password!']);
		} else {
			echo json_encode(['status'=>0, 'message'=>'Current password not match!']);
		}
		exit;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusUser()
	{
		global $app;
		$id = $app['prs']['id'];
		$user = new user_model();
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $user);
	}

	public function changeStatus($id, $dataRecord, $model) {
		if($model->editRecord($id, $dataRecord, "role != 1")){
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
	public function deleteUser()
	{
		global $app;
		$ids = $app['prs']['id'];
		$user = new user_model();
		$this->handleDeleteMany($ids, $user);
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

	public function changeStatusManyUser()
	{
		global $app;
		$ids = $app['prs']['id'];
		$user = new user_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $user);
	}

	public function changeStatusMany($ids, $dataRecord, $model) {
		$ids = explode(",",$ids);
		if( !empty($ids) && count($ids) > 0 ) {
			foreach ($ids as $id) {
				$model->editRecord($id, $dataRecord, "role != 1");
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