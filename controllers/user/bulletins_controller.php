<?php
class bulletins_controller extends aside_bar_data_controller
{
	public function index()
	{
		$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$conditionsTmp = "user_id = {$userID} AND  admin_status = 1";
		$bulletin = new bulletin_model();
		$this->records = $bulletin->allp('*',['conditions'=>$conditionsTmp, 'order'=>'updated DESC']);
		$this->display();
	}

	public function add() {
		if(isset($_POST['content'])) {
			$bm = new bulletin_model();
			$bulletinData['content'] = $_POST['content'];
			$bulletinData['user_id'] = $_SESSION['user']['id'];
			
			$valid = $bm->validator($bulletinData);
			if($valid['status']) {
				if( $id = $bm->addRecord($bulletinData)){
					$bulletinData = $bm->getRecord($id);
					$data = [
						'status' => true,
						'data' => $bulletinData
					];
					http_response_code(200);
					echo json_encode($data);
				}else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$data = [
						'status' => true,
						'data' => $this->errors
					];
					http_response_code(501);
					echo json_encode($data);
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$data = [
					'status' => true,
					'data' => $this->errors
				];
				http_response_code(501);
				echo json_encode($data);
			}
		}else{
			$data = [
				'status' => false,
				'data' => json_encode($_POST)
			];
			http_response_code(501);
			echo json_encode($data);
		}
	}

	public function edit() {
		$bm = new bulletin_model();
		if(isset($_POST['content'])) {
			$bulletinData['content'] = $_POST['content'];
			$valid = $bm->validator($bulletinData, $_POST['id']);
			if($valid['status']) {
				if($bm->editRecord($_POST['id'], $bulletinData)) {
					$data = [
						'status' => true,
						'data' => $bulletinData
					];
					http_response_code(200);
					echo json_encode($data);
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$data = [
						'status' => true,
						'data' => $this->errors
					];
					http_response_code(501);
					echo json_encode($data);
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$data = [
					'status' => true,
					'data' => $this->errors
				];
				http_response_code(501);
				echo json_encode($data);
			}
		}else{
			$data = [
				'status' => false,
				'data' => json_encode($_POST)
			];
			http_response_code(501);
			echo json_encode($data);
		}
	}

	public function delete() {
		$bm = new bulletin_model();
		$id = $_POST['id'];
		if ($bm->delRelativeRecords($id, null, $this->controller)){
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
		$bulletin = new bulletin_model();
		$dataRecord = [
			'owner_status' => $_POST['owner_status']
		];
		if($bulletin->editRecord($_POST['bulletin'], $dataRecord)){
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