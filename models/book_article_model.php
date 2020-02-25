<?php
class book_article_model extends vendor_pagination_model
{
	public $nopp = 10;
	public static $avatUrl = UploadREL."users/";
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];
	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],
			['book_category', 'key'=>'categories_id']			
		],
		'hasMany'	=>	[
			['book_comment',	'key'=>'article_id',	'on_del'=>true],
			['book_like',	'key'=>'article_id',	'on_del'=>true],
		],
	];

	public function rules() {
		global $app;
	    return [
			'title' => ['string','required', ['max', 'value'=>255]],
			'ISBN' => ['string','required', 'unique', ['min', 'value'=>10], ['max', 'value'=>20]],
			'author' => ['string','required', ['max', 'value'=>100]],
			'slug' => ['string','unique', ['max', 'value'=>255]],
	    ];
	}

	public function setToUnknownCategories($ids){
		$sql = "UPDATE book_articles SET categories_id = 0 WHERE categories_id in (".$ids.")";
		$allRow = $this->con->query($sql);
	}

	public function getLastInsertId($table){
		$sql = "SELECT LAST_INSERT_ID() as id FROM $table ";
		$result = $this->con->query($sql);
		$id = mysqli_fetch_assoc($result);
		return $id;
	}

	public function getBookInBookGroupLastInsertId($table){
		$sql = "SELECT LAST_INSERT_ID() as id FROM $table WHERE in_book_group=1";
		$result = $this->con->query($sql);
		$id = mysqli_fetch_assoc($result);
		return $id;
	}

	public function getBookUserID($userID)
	{
		$query = "SELECT id,title FROM $this->table WHERE user_id = {$userID}";
		$result = $this->con->query($query);
		$records = array();
		if($result) {
			while($row = mysqli_fetch_assoc($result)) {
				$records[] = $row;
			}
		} else $record=false;

		return $records;
	}

	public function readPaging($from_record_num, $records_per_page, $filed_oder_by, $conditions)
	{
		$conditions = $conditions == ''?'in_book_group = 0':$conditions.' AND in_book_group = 0';
	    $rows =$this->all('book_articles.*, users.*, book_categories.*, book_articles.id as id, book_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['user', 'book_category'], 'order'=> $filed_oder_by.' DESC LIMIT '.$from_record_num.','.$records_per_page]);
		return $rows;
	}
	
}
?>