<?php
class must_reads_article_model extends vendor_pagination_model
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
			['must_reads_category', 'key'=>'categories_id']			
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
		$sql = "UPDATE must_reads_articles SET categories_id = 0 WHERE categories_id in (".$ids.")";
		$allRow = $this->con->query($sql);
	}

	public function readPaging($from_record_num, $records_per_page, $filed_oder_by, $conditions){
	    $rows =$this->all('must_reads_articles.*, users.*, must_reads_categories.*, must_reads_articles.id as id, must_reads_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['user', 'must_reads_category'], 'order'=> $filed_oder_by.' DESC LIMIT '.$from_record_num.','.$records_per_page]);
		return $rows;
	}
	
}
?>