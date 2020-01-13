<?php
class likes_controller extends vendor_main_controller
{
	public function getLike()
	{
		$lkm = new like_model();
		$user_id = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
		$object_article_id = $_POST['object_article_id'];
		$table_model = $_POST['table_model'];
		$status = $_POST['status'];
		($status && $status == 1) ? $lkm->like($user_id, $object_article_id, $table_model) : $lkm->unLike($user_id, $object_article_id, $table_model);
		
	}
}

?>
