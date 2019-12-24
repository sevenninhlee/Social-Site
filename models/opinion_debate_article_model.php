<?php
class opinion_debate_article_model extends vendor_pagination_model
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
			['opinion_debate_category', 'key'=>'categories_id']			
		],
		'hasMany'	=>	[
			['opinion_debate_comment',	'key'=>'article_id',	'on_del'=>true],
			['opinion_debate_like',	'key'=>'article_id',	'on_del'=>true],
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
		$sql = "UPDATE opinion_debate_articles SET categories_id = 0 WHERE categories_id in (".$ids.")";
		$allRow = $this->con->query($sql);
	}
	
	public function readPaging($from_record_num, $records_per_page, $filed_oder_by, $conditions){
	    $rows =$this->all('opinion_debate_articles.*, users.*, opinion_debate_categories.*, opinion_debate_articles.id as id, opinion_debate_articles.slug as slug',['conditions'=>$conditions, 'joins'=>['user', 'opinion_debate_category'], 'order'=> $filed_oder_by.' DESC LIMIT '.$from_record_num.','.$records_per_page]);
		return $rows;
	}

	public function getCountComment($article_id){
		$query = "SELECT COUNT(*) as total_rows FROM review_ratings WHERE object_article_id='$article_id' AND table_model='opinion_debate_article_model'";
	    $result = $this->con->query($query);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
	 
	    return $record['total_rows'];
	}
}
?>