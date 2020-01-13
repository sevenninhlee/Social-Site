<?php
class friend_model extends vendor_frap_model
{
	public $nopp = 10;
	protected $relationships = [
		'belongTo'	=>	[
            ['user','key'=>'user_id'],
		]
    	];

	public function rules() {
		global $app;
		return [
			'content' => ['string', ['min', 'value'=>1]],
		];
	}

	public function isMyFriend($user_id, $user_id_friend)
	{
		$listFriends = $this->all('*',['conditions'=>'user_id = '.$user_id.' AND approved = 1 ', 'joins'=>false]);
		$user_friend = [];
		foreach ($listFriends as $value) {
			array_push($user_friend, $value['user_id_friend']);
		}

		if( in_array($user_id_friend, $user_friend)) {
			return true;
		} else {
			return false;
		}
	}
}
?>