<?php
class user_model extends vendor_frap_model
{
	public $nopp = 10;
	public static $avatUrl = UploadREL."users/";
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];
	public static $gender = [
						0 => 'Female',
						1 => 'Male'
					];

	protected $relationships = [
		'hasMany'	=>	[
			['book_group_article_user',	'key'=>'user_id',	'on_del'=>true],	
		]
	];

	public function rules() {
		global $app;
	    return [
        	'firstname' => ['string', ['max', 'value'=>50]],
        	'lastname' 	=> ['string', ['max', 'value'=>50]],
        	'email' 	=> [['required', 'errmsg'=>'Email can not blank!'], 'unique', ['email','errmsg'=>'Value is invalid email format!'], ['max', 'value'=>60]],
        	'phone' 	=> ['number', ['min', 'value'=> 9], ['max', 'value'=>14]],
	        'password' 	=> ($app['act']=='edit')? []: [['min', 'value'=> 4], ['max', 'value'=>60]],
	        				// Problem when edit user -> can't validate password
	        'address' 	=> ['string'],
	        'role'		=> [['inlist', 'value'=>array_keys($app['roles'])]],
	        'status'	=> [['inlist', 'value'=>array_keys(self::$status)]]
	    ];
	}

	public static function getAvataUrl() {
		return RootURL.self::$avatUrl.$_SESSION['user']['avata'];
	}

	public static function getFullnameLogined() {
		return ucfirst($_SESSION['user']['firstname'])." ".ucfirst($_SESSION['user']['lastname']);
	}

	public static function getFullname($id) {
		$user = (new self)->getRecord($id);
		return ucfirst($user['firstname'])." ".ucfirst($user['lastname']);
	}

	public function getTopUser()
	{
		$rsAll = $this->getAllData();
		$topUser = array();
		for($id = 0; $id < NUM_TOP_USERS; $id++){
			if(isset($rsAll[$id]))
				$topUser[$id] = $rsAll[$id];
			else break;
		}
		return $topUser;
	}

	public function getAllChangepass()
	{
		$email = ucfirst($_SESSION['user']['email']);
		$sql = "SELECT `password` FROM `users` WHERE `email` = '".$email."'";
		$result = $this->con->query($sql);
		
		return $result;
	}

	public function checkOldPassword($password)
	{
		$email = ucfirst($_SESSION['user']['email']);
		$sql = "SELECT COUNT(id) as total  FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'";
		$result = $this->con->query($sql);
		return $result->fetch_assoc()['total'];
	}

	public function updatePassword($newpassword)
	{
		$email = ucfirst($_SESSION['user']['email']);
		$sql = "UPDATE users SET password='$newpassword' WHERE `email` = '".$email."'";
		$result = $this->con->query($sql);
		
		return $result;
	}
	
	public function profile(){
		$email = ucfirst($_SESSION['user']['email']);
		$sql = "SELECT * FROM `users` WHERE `email` = '".$email."'";
		$result = $this->con->query($sql);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
		return $record;
	}

	public function getLongestUser() {
		$join = "";
		$fields = $this->table.".id, ".$this->table.".lastname";
		if(isset($this->relationships)) {
			$joinFields = $join = "";
			foreach($this->relationships as $k=>$rv) {
				if(!vendor_app_util::is_multi_array($rv)) {
					$vtmp = $rv;
					$rv = [];
					$rv[] = $vtmp;
				}
				foreach($rv as $v) {
					if(isset($options['joins']) && ($v[0]!='report'))
						continue;
					$joinTable = $this->getTableNameFromModelName($v[0]);
					$joinTableFields = $this->getAllFieldsOfTable($joinTable);
					if($k=="hasMany") {
						$joinFields .= ", SUM(".$joinTable.".work_time) as user_time";
						$join .= " RIGHT JOIN ".$joinTable." ON ".$this->table.".id=".$joinTable.".".$v['key']." ";
						break;
					}
				}
			}
			if($joinFields)	$fields .= $joinFields;
		}
		$group = " GROUP BY ".$this->table.".id";

		$order = " ORDER BY user_time DESC";
		$limit = " LIMIT 1";
		
		$sql = "SELECT ".$fields." FROM ".$this->table.$join.$group.$order.$limit;
		$result = $this->con->query($sql);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
		return $record;
	}

	public function getRecordWithSetting($user_id){
		$user = $this->getRecord($user_id);
		// $user = $this->getRecord($user_id, "*", ['conditions'=>"", 'joins'=>['notify_action']]);
		$notify_action_model = new notify_action_model();
		$notiActions = $notify_action_model->all('*',['conditions'=>'user_id = '.$user_id, 'joins'=>false, 'order'=> ' action ASC ']);

		$user['is_notification_friend_post'] 		= 1;
		$user['is_notification_friend_request'] 	= 1;
		$user['is_notification_post_approved'] 		= 1;
		$user['is_notification_get_new_comment'] 	= 1;
		$user['is_disabled_all_notification'] 		= 0;

		$user['is_email_friend_post'] 		= 1;
		$user['is_email_friend_request'] 	= 1;
		$user['is_email_post_approved'] 	= 1;
		$user['is_email_get_new_comment'] 	= 1;
		$user['is_disabled_all_email'] 		= 0;
		foreach ($notiActions as $key => $value) {
			if($value['action'] == 1) $user['is_notification_friend_post'] 		= $value['status'];
			if($value['action'] == 2) $user['is_notification_friend_request'] 	= $value['status'];
			if($value['action'] == 3) $user['is_notification_post_approved'] 	= $value['status'];
			if($value['action'] == 4) $user['is_notification_get_new_comment'] 	= $value['status'];
			if($value['action'] == 5) $user['is_disabled_all_notification'] 	= $value['status'];

			if($value['action'] == 6) $user['is_email_friend_post'] 		= $value['status'];
			if($value['action'] == 7) $user['is_email_friend_request'] 		= $value['status'];
			if($value['action'] == 8) $user['is_email_post_approved'] 		= $value['status'];
			if($value['action'] == 9) $user['is_email_get_new_comment'] 	= $value['status'];
			if($value['action'] == 10) $user['is_disabled_all_email'] 		= $value['status'];
		}
		return $user;
	}

	public function getListFriend($id_user=null){
		$userID = isset($id_user) ? $id_user : $_SESSION['user']['id'];
		$conditionsTmp = "(user_id = {$userID} OR  user_id_friend = {$userID}) AND approved = 1";
		$friend = new friend_model();
		$users = $friend->allp('*',['conditions'=>$conditionsTmp, 'order'=>'updated DESC']);
		$this->user = $this->getRecord($userID);
		foreach ($users['data'] as $key => $value) {
			$userIDFriend = ($value['user_id'] == $userID)?$value['user_id_friend']:$value['user_id'];
			$user = $this->getRecordWithSetting($userIDFriend);

			$users['data'][$key]['username'] = vendor_html_helper::showUserName($user);
			$users['data'][$key]['user_id_friend'] = $userIDFriend;
			$users['data'][$key]['status_user_admin'] = ($value['user_id'] == $userID)?$value['status_user']:$value['status_user_friend'];
			$users['data'][$key]['user_avatar'] = $user['avata'];
			$users['data'][$key]['email'] = $user['email'];

			$users['data'][$key]['is_notification_friend_post'] 	= $user['is_notification_friend_post'];
			$users['data'][$key]['is_notification_friend_request'] 	= $user['is_notification_friend_request'];
			$users['data'][$key]['is_notification_post_approved'] 	= $user['is_notification_post_approved'];
			$users['data'][$key]['is_notification_get_new_comment'] = $user['is_notification_get_new_comment'];
			$users['data'][$key]['is_disabled_all_notification'] 	= $user['is_disabled_all_notification'];

			$users['data'][$key]['is_email_friend_post'] 		= $user['is_email_friend_post'];
			$users['data'][$key]['is_email_friend_request'] 	= $user['is_email_friend_request'];
			$users['data'][$key]['is_email_post_approved'] 		= $user['is_email_post_approved'];
			$users['data'][$key]['is_email_get_new_comment'] 	= $user['is_email_get_new_comment'];
			$users['data'][$key]['is_disabled_all_email'] 		= $user['is_disabled_all_email'];
		}

		return $users;
	}

	public function getListUserJoinedBookGroup($bookGroupId){
		$conditionsTmp = "(book_group_article_id = {$bookGroupId}) AND owner_status=1 AND admin_status=1";
		$book_group_article_user_model = new book_group_article_user_model();
		$users = $book_group_article_user_model->allp('*',['conditions'=>$conditionsTmp, 'order'=>'updated DESC']);
		foreach ($users['data'] as $key => $value) {
			$user = $this->getRecordWithSetting($value['user_id']);
			$users['data'][$key]['email'] = $user['email'];

			$users['data'][$key]['is_notification_friend_post'] 	= $user['is_notification_friend_post'];
			$users['data'][$key]['is_notification_friend_request'] 	= $user['is_notification_friend_request'];
			$users['data'][$key]['is_notification_post_approved'] 	= $user['is_notification_post_approved'];
			$users['data'][$key]['is_notification_get_new_comment'] = $user['is_notification_get_new_comment'];
			$users['data'][$key]['is_disabled_all_notification'] 	= $user['is_disabled_all_notification'];

			$users['data'][$key]['is_email_friend_post'] 		= $user['is_email_friend_post'];
			$users['data'][$key]['is_email_friend_request'] 	= $user['is_email_friend_request'];
			$users['data'][$key]['is_email_post_approved'] 		= $user['is_email_post_approved'];
			$users['data'][$key]['is_email_get_new_comment'] 	= $user['is_email_get_new_comment'];
			$users['data'][$key]['is_disabled_all_email'] 		= $user['is_disabled_all_email'];
		}
		return $users;
	}
}
?>