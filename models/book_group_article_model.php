<?php
class book_group_article_model extends vendor_pagination_model
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
			['book_group_article_user',	'key'=>'book_group_article_id',	'on_del'=>false],	
			['book_group_article_book',	'key'=>'book_group_article_id',	'on_del'=>false],	
		],
	];

	public function rules() {
		global $app;
	    return [
			'title' => ['string','unique', ['max', 'value'=>255]],
			'slug' => ['string','unique', ['max', 'value'=>255]],
			// 'description' => ['string','unique', ['min', 'value'=>255]],
	    ];
	}

	public function setToUnknownCategories($ids){
		$sql = "UPDATE book_group_articles SET categories_id = 0 WHERE categories_id in (".$ids.")";
		$allRow = $this->con->query($sql);
	}

	public function getBookGroupIsOrganizer($userID)
	{
		$conditions = "user_id = {$userID} AND admin_status = 1";
		$datas = $this->allp('*',['conditions'=>$conditions, 'joins'=>['user', 'book_category'], 'order'=>'created DESC']);
		$userbg = new book_group_article_user_model();
		foreach($datas['data'] as $key => $record){
			$datas['data'][$key]['checkUser'] = $userbg->checkUserInGroup($record['id']);
			$datas['data'][$key]['userNum'] = $userbg->getCountRecords(['conditions'=>'book_group_article_id='.$record['id']]) + 1;
        }
        return $datas;
	}

	public function getJoinRecords($id)
	{
		$query = " SELECT
                	bg.*, u.firstname as user_firstname, u.lastname as user_lastname, u.username as user_username, u.show_name as user_show_name
	            FROM
	                " . $this->table . " bg
	                INNER JOIN users u
					    ON u.id = bg.user_id
					WHERE bg.id = {$id}";
	    $result = $this->con->query($query);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
		return $record;
	}

	public function readPaging($from_record_num, $records_per_page, $filed_oder_by, $conditions)
	{
		 
	    $rows =$this->all('book_group_articles.*, users.*, book_categories.*, book_group_articles.id as id,book_group_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['user', 'book_category'], 'order'=> $filed_oder_by.' DESC LIMIT '.$from_record_num.','.$records_per_page]);
		return $rows;
	}
	
}
?>