<?php
class notify_action_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];
	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],		
		],
	];

	public function checkActionNotify($user_id)
	{
		global $app;
		$listActions = [];
		$notiUserActions = $this->all('*',['conditions'=>'user_id = '.$user_id, 'joins'=>false, 'order'=> ' action ASC ']);
		$notiDefaultActions = $app['notify_actions'];
		if(!empty($notiUserActions)) {
			foreach ($notiUserActions as $key => $notiUserAction) {
	            if((int)$notiUserAction['status'] == (int)$notiDefaultActions[(int)$notiUserAction['action']]['status']){
	            	array_push($listActions, $notiUserAction['action']);
	            }
	        }
		} else {
			foreach ($notiDefaultActions as $key => $value) {
				array_push($listActions, $key);
			}
		}

		return $listActions;
	}
}
?>