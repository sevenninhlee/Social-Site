<?php
class users_controller extends vendor_auth_controller
{
	protected $isUserLogged = false;
	protected $checkfriend = null;

	public function __construct()
	{
		if( isset($_GET['user']) && isset($_SESSION['user']) && $_SESSION['user']['id'] == $_GET['user'] || empty($_GET['user'])) {
			$this->isUserLogged = true;
		}
		$this->checkFriend();
		parent::__construct();
	}


	public function checkFriend(){
		// Check if they are friends or not
		// 0: Add as a friend
		// 1: Already a friend
		// 2: Send request friend
		// 3: Approve
		if( isset($_SESSION) && isset($_SESSION['user']) && isset($_GET['user']) && isset($_SESSION['user']['id']) && $_GET['user'] != $_SESSION['user']['id']){
			$friend = new friend_model();
			$checkFriendUser = $friend->getRecordWhere(['user_id'=>$_GET['user'], 'user_id_friend'=>$_SESSION['user']['id']]);
			$checkFriendUser2 = $friend->getRecordWhere(['user_id_friend'=>$_GET['user'], 'user_id'=>$_SESSION['user']['id']]);
			if($checkFriendUser){
				if($checkFriendUser['approved'] == 1){
					$this->checkfriend = 1;
				}
				else{
					$this->checkfriend = ($checkFriendUser['user_id'] == $_SESSION['user']['id'])? 2:3;
				}
			}
			if($checkFriendUser2){
				if($checkFriendUser2['approved'] == 1){
					$this->checkfriend = 1;
				}
				else{
					$this->checkfriend = ($checkFriendUser2['user_id'] == $_SESSION['user']['id'])? 2:3;
				}
			}
		}
	}
}
?>