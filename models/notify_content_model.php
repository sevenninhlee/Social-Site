<?php
class notify_content_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];
	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],	
			['notify_action','key'=>'action_id'],	
		],
	];

	public function updateStatusNotify($setStatus, $whereRecord){
		$sql = "UPDATE $this->table SET {$setStatus} WHERE {$whereRecord}" ;
		$allRow = $this->con->query($sql);
	}

	public function getNotifyContents($noti_id, $sesUserId, $whereRecord = '')
	{
		$frm = new friend_model();
		$listFriends = $frm->all('friends.user_id_friend, friends.user_id, friends.updated',['conditions'=>'(user_id = '.$sesUserId.' OR user_id_friend = '.$sesUserId.') AND approved = 1', 'joins'=>false]);
		$listSendAddFriends = $frm->all('friends.user_id',['conditions'=>'( user_id_friend = '.$sesUserId.') AND approved = 0', 'joins'=>false]);
		$listFrId = [];
		$test = [];
		foreach ($listFriends as $value) {
			($value['user_id_friend'] == $sesUserId) ? array_push($listFrId, $value['user_id']) : array_push($listFrId, $value['user_id_friend']);
		}
		$listFrId = implode(',', $listFrId);
		$listFrId = strlen($listFrId) > 0 ? $listFrId : 0;

		$listSendFrId = [];
		
		foreach ($listSendAddFriends as $value) {
			array_push($listSendFrId, $value['user_id']);
		}
		$listSendFrId = implode(',', $listSendFrId);

		$sql = "SELECT * FROM $this->table WHERE  action_id IN ($noti_id) $whereRecord AND 
		(
			( user_id != $sesUserId AND user_id IN ($listFrId) AND action_id = 1 AND created > DATE(CURDATE()))
			OR (user_id = $sesUserId AND action_id = 2)
			OR (user_id = $sesUserId AND action_id = 3)
			OR (user_id = $sesUserId AND action_id = 4)
			OR (user_id = $sesUserId AND action_id = 6)
		)

		 ORDER BY id DESC" ;

		$result = $this->con->query($sql);
		if($result) {
			$rows = array();
			while($row = mysqli_fetch_assoc($result)) {
				$rows[] = $row;
			}
			return $rows;
		} else {
			return false;
		}
	}
}
?>