<?php
class book_group_article_book_model extends vendor_frap_model
{
	public $nopp = 10;
	protected $relationships = [
		'belongTo'	=>	[
			['book_article','key'=>'book_id'],
			['book_group_article', 'key'=>'book_group_article_id']
		],
	];
	

	public function getBooks($id, $wheres = "") {
		$query = " SELECT
                	b.*, u.firstname, u.lastname,bb.*, bb.id as book_group_id
	            FROM
	                " . $this->table . " bb
	                INNER JOIN book_articles b
					    ON b.id = bb.book_id
					INNER JOIN book_group_articles bg
						ON bb.book_group_article_id = bg.id
					INNER JOIN users u
					    ON u.id = bg.user_id
					WHERE bb.book_group_article_id = {$id} AND bb.admin_status = 1".$wheres;
		// echo "Start <br/>"; echo '<pre>'; print_r($query);echo '</pre>';exit("End Data");
		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function checkBookIsCurrent($book_group_article_id, $book_id)
	{
		$data = $this->getRecordWhere([
			'book_group_article_id' => $book_group_article_id,
			'book_id' => $book_id,
			'owner_status' =>1,
			'current_read_status' => 1
		]);
		if($data) return true;
		else return false;
	}

	public function checkBookIsPrevious($book_group_article_id, $book_id)
	{
		$data = $this->getRecordWhere([
			'book_group_article_id' => $book_group_article_id,
			'book_id' => $book_id,
			'previous_read_status' => 1,
			'owner_status' =>1,
		]);
		if($data) return true;
		else return false;
	}

	public function checkBookIsPreviousCurrent($book_group_article_id, $book_id, $action)
	{
		$data = $this->getRecordWhere([
			'book_group_article_id' => $book_group_article_id,
			'book_id' => $book_id,
			$action => 1,
			'owner_status' =>1,
		]);
		if($data) return true;
		else return false;
	}
}
?>