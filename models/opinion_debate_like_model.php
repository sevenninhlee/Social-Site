<?php
class opinion_debate_like_model extends vendor_frap_model
{
	public $nopp = 10;
	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],
			['opinion_debate_article', 'key'=>'categories_id']			
		]
	];
	public function countLike($article_id){
		
	}
}
?>