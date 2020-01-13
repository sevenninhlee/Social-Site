<?php
class notifications_controller extends vendor_main_controller
{
	public function index() {
		$view = $_POST['view'];
		$notify = new notify_content_model();
		$user_id = $_SESSION['user']['id'];
		$are_page = $_POST['are_page'];

		if( $_POST['are_page'] === "admin") {
			$notifyReads = $notify->all('*',['conditions'=>'action_id = 0 AND admin_status = 1', 'joins'=>false, 'order'=> ' created DESC']);
			$notifyDatas = $notify->all('*',['conditions'=>'action_id = 0', 'joins'=>false, 'order'=> ' created DESC']);

			$this->getNotify($view, $notifyDatas, $notifyReads, $are_page);
		} 

		if( ($_POST['are_page'] === "users" || $_POST['are_page'] === "user") && isset($_SESSION['user'])) {
			$notiAcm = new notify_action_model();
			$statusList = $notiAcm->checkActionNotify($user_id);
			$statusList = implode(',', $statusList);
			$statusList .= ',6';
			$notifyDatas = $notify->getNotifyContents($statusList, $user_id);
			// echo "Start <br/>"; echo '<pre>'; print_r($notifyDatas);echo '</pre>';exit("End Data");
			$list_user_id = $user_id;
			$notifyIdReads = [];
			foreach ($notifyDatas as $notifyData) {
				if(strpos($notifyData['user_id_read'],(string)$user_id) === false) {
					array_push($notifyIdReads, $notifyData['id']);
				}
			}
			$notifyIdReads = implode(',', $notifyIdReads);
			$notifyReads = $notify->getNotifyContents($statusList, $user_id, "AND id IN ($notifyIdReads)" );
			$this->getNotify($view, $notifyDatas, !empty($notifyReads) ? $notifyReads : [], $are_page);
		}
	}

	public function getNotify($view, $notifyDatas, $notifyReads, $are_page){
		$notify = new notify_content_model();
		if(isset($view)){
			if($view != '')
			{
				if($are_page === "users" || $are_page === "user") {
					$list_user_id = (string)$_SESSION['user']['id'];
					foreach ($notifyReads as $noti_read) {
						if(isset($noti_read['user_id_read']) && strpos($noti_read['user_id_read'], (string)$_SESSION['user']['id']) === false) {
							$list_user_id = $list_user_id.','.$noti_read['user_id_read'];
						} else {
							$list_user_id = (string)$_SESSION['user']['id'];
						}
						$notify->editRecord($noti_read['id'], ['user_id_read' => $list_user_id]);
					}
				} 
				if($are_page === "admin") {
					foreach ($notifyReads as $noti_read) {
						$notify->editRecord($noti_read['id'], ['admin_status' => 0]);
					}
				}

				$data = [
					'dropdown' => 1,
					'notification' => 'Show data success!'
				];
				echo json_encode($data);

			} else {
				$output = '';
				if($notifyDatas) {
					$data = [
						'status' => 1,
						'notification' => $notifyDatas,
	    				'unseen_notification'  => count($notifyReads)
					];
				} else {
					$data = [
						'status' => 0,
						'notification' => 'Data not found!'
					];
				}

				echo json_encode($data);
			}
		}
	}

	public function showNotifyContent($user_id, $action, $view)
	{
		$resultNotifyReads = [];
		$resultNotifyDatas = [];
		switch ($action) {
		 	case 1:
		 		$notify = new notify_content_model();
		 		$frm = new friend_model();
		 		$setStatus	= "owner_status = 0";
		 		$notifyReads = $notify->all('*',['conditions'=>'action_id = '.$action.' AND owner_status = 1 AND user_id != '.$user_id, 'joins'=>false, 'order'=> ' created DESC']);
				$notifyDatas = $notify->all('*',['conditions'=>'action_id = '.$action. ' AND user_id != '.$user_id, 'joins'=>false, 'order'=> ' created DESC']);
				// $whereRecord = "owner_status = 1 AND action_id = ".$action;
				// $this->getNotify($view, $notifyDatas, $notifyReads, $setStatus, $whereRecord);
				
				foreach ($notifyReads as $key => $notifyRead) {
					$isFriend1 = $frm->isMyFriend($user_id, $notifyRead['user_id']);
					$isFriend2 = $frm->isMyFriend($notifyRead['user_id'], $user_id);
					if($isFriend1 == 1 || $isFriend2 == 1) {
						array_push($resultNotifyReads, $notifyRead);
					}
				}

				foreach ($notifyDatas as $key => $notifyData) {
					$isFriend1 = $frm->isMyFriend($user_id, $notifyData['user_id']);
					$isFriend2 = $frm->isMyFriend($notifyData['user_id'], $user_id);
					if($isFriend1 == 1 || $isFriend2 == 1) {
						array_push($resultNotifyDatas, $notifyData);
					}
				}

				$whereRecord = "owner_status = 1 AND action_id = ".$action;
				$this->getNotify($view, $resultNotifyDatas, $resultNotifyReads, $setStatus, $whereRecord);
		 		break;

		 	case 2:
		 		
		 		// echo "Start <br/>"; echo '<pre>'; print_r('status_2');echo '</pre>';exit("End Data");
		 		break;
		 	case 3:
		 		$notify = new notify_content_model();
		 		$frm = new friend_model();
		 		$setStatus	= "owner_status = 0";
		 		$notifyReads = $notify->all('*',['conditions'=>'action_id = '.$action.' AND owner_status = 1 AND user_id != '.$user_id, 'joins'=>false, 'order'=> ' created DESC']);
				$notifyDatas = $notify->all('*',['conditions'=>'action_id = '.$action. ' AND user_id != '.$user_id, 'joins'=>false, 'order'=> ' created DESC']);
				// $whereRecord = "owner_status = 1 AND action_id = ".$action;
				// $this->getNotify($view, $notifyDatas, $notifyReads, $setStatus, $whereRecord);
				
				foreach ($notifyReads as $key => $notifyRead) {
					$isFriend1 = $frm->isMyFriend($user_id, $notifyRead['user_id']);
					$isFriend2 = $frm->isMyFriend($notifyRead['user_id'], $user_id);
					if($isFriend1 == 1 || $isFriend2 == 1) {
						array_push($resultNotifyReads, $notifyRead);
					}
				}

				foreach ($notifyDatas as $key => $notifyData) {
					$isFriend1 = $frm->isMyFriend($user_id, $notifyData['user_id']);
					$isFriend2 = $frm->isMyFriend($notifyData['user_id'], $user_id);
					if($isFriend1 == 1 || $isFriend2 == 1) {
						array_push($resultNotifyDatas, $notifyData);
					}
				}

				$whereRecord = "owner_status = 1 AND action_id = ".$action;
				$this->getNotify($view, $resultNotifyDatas, $resultNotifyReads, $setStatus, $whereRecord);
		 		break;
		 	case 4:
		 		
		 		// echo "Start <br/>"; echo '<pre>'; print_r('status_4');echo '</pre>';exit("End Data");
		 		break;
		 	case 5:
		 		
		 		// echo "Start <br/>"; echo '<pre>'; print_r('status_5');echo '</pre>';exit("End Data");
		 		break;
		 	default:
		 		// code...
		 		break;
		}
	}


}
?>
