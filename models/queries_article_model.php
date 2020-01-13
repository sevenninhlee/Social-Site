<?php
class queries_article_model extends vendor_pagination_model
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
			['queries_category', 'key'=>'categories_id']			
		],
		'hasMany'	=>	[
			['queries_comment',	'key'=>'article_id',	'on_del'=>true],
			['queries_like',	'key'=>'article_id',	'on_del'=>true],
		],
	];

	public function rules() {
		global $app;
	    return [
			'title' => ['string','unique', ['max', 'value'=>255]],
			'slug' => ['string','unique', ['max', 'value'=>255]],
	    ];
	}

	public function setToUnknownCategories($ids){
		$sql = "UPDATE queries_articles SET categories_id = 0 WHERE categories_id in (".$ids.")";
		$allRow = $this->con->query($sql);
	}

	public function readPaging($from_record_num, $records_per_page, $filed_oder_by, $conditions)
	{
	    $rows =$this->all('queries_articles.*, users.*, queries_categories.*, queries_articles.id as id, queries_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['user', 'queries_category'], 'order'=> $filed_oder_by.' DESC LIMIT '.$from_record_num.','.$records_per_page]);
		return $rows;
	}
	
}
?>