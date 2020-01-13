<?php
class book_group_article_user_model extends vendor_frap_model
{
	public $nopp = 10;
	protected $table = "book_group_article_users";
	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],
			['book_group_article', 'key'=>'book_group_article_id']		
		],
	];


	public function getUsers($id) {
		$query = " SELECT
                	bu.id as book_group_id,bu.user_id,bu.status as bgr_user_status, u.*
	            FROM
	                " . $this->table . " bu
	                INNER JOIN users u
					    ON u.id = bu.user_id
					INNER JOIN book_group_articles b
					    ON bu.book_group_article_id = b.id
					WHERE bu.book_group_article_id = {$id}";
	    $result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function getBookGroupIsMember($userID)
	{
		$query = " SELECT
                	bu.id as book_group_article_user_id,bu.owner_status as book_group_owner_status,u.id as user_id, u.firstname, u.lastname, b.*
	            FROM
	                " . $this->table . " bu
					INNER JOIN book_group_articles b
					    ON bu.book_group_article_id = b.id
					INNER JOIN users u
					    ON u.id = b.user_id
					WHERE bu.user_id = {$userID} AND bu.status = 1 ";
	    $result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		foreach($rows as $key => $record){
			($userID == $_SESSION['user']['id']) ? $rows[$key]['checkUser'] = true : $rows[$key]['checkUser'] = false;
			$rows[$key]['userNum'] = $this->getCountRecords(['conditions'=>'book_group_article_id='.$record['id']]) + 1;
        }
		return $rows;
	}

	public function checkUserInGroup($book_group_article_id)
	{
		$data = $this->getRecordWhere([
			'book_group_article_id' => $book_group_article_id,
			'user_id' => $_SESSION['user']['id'],
			'status' => 1
		]);
		if($data) return true;
		else return false;
	}

	public function checkUserIsApprove($book_group_article_id)
	{
		$data = $this->getRecordWhere([
			'book_group_article_id' => $book_group_article_id,
			'user_id' => $_SESSION['user']['id'],
			'status' => 0
		]);
		if($data) return true;
		else return false;
	}

	public function checkUserIsDisapprove($book_group_article_id)
	{
		$data = $this->getRecordWhere([
			'book_group_article_id' => $book_group_article_id,
			'user_id' => $_SESSION['user']['id'],
			'status' => 2
		]);
		// echo "Start <br/>"; echo '<pre>'; print_r($book_group_article_id);echo '</pre>';exit("End Data");
		if($data) return true;
		else return false;
	}
}
?>