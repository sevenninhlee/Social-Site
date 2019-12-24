<?php
class election_central_article_model extends vendor_pagination_model
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
			['election_central_category', 'key'=>'categories_id']			
		]
	];

	public function rules() {
		global $app;
	    return [
			'title' => ['string','unique', ['max', 'value'=>255]],
			'slug' => ['string','unique', ['max', 'value'=>255]],
	    ];
	}

	public function setToUnknownCategories($ids){
		$sql = "UPDATE election_central_articles SET categories_id = 0 WHERE categories_id in (".$ids.")";
		$allRow = $this->con->query($sql);
	}

	public function readPaging($from_record_num, $records_per_page, $filed_oder_by, $conditions){
	    $rows =$this->all('election_central_articles.*, users.*, election_central_categories.*, election_central_articles.id as id, election_central_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['user', 'election_central_category'], 'order'=> $filed_oder_by.' DESC LIMIT '.$from_record_num.','.$records_per_page]);
		return $rows;
	}
	
}
?>