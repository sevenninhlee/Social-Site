<?php
class film_article_model extends vendor_pagination_model
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
			['film_category', 'key'=>'categories_id']			
		],
		'hasMany'	=>	[
			['film_comment',	'key'=>'article_id',	'on_del'=>true],
			['film_like',	'key'=>'article_id',	'on_del'=>true],
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
		$sql = "UPDATE film_articles SET categories_id = 0 WHERE categories_id in (".$ids.")";
		$allRow = $this->con->query($sql);
	}

	public function readPaging($from_record_num, $records_per_page, $filed_oder_by, $conditions)
	{
		
	    $rows =$this->all('film_articles.*, film_categories.*, film_articles.id as id, film_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['film_category'], 'order'=> $filed_oder_by.' DESC LIMIT '.$from_record_num.','.$records_per_page]);
		return $rows;
	}
}
?>