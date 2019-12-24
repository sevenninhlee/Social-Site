<?php
class queries_like_model extends vendor_frap_model
{
	public $nopp = 10;
	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],
			['queries_article', 'key'=>'categories_id']			
		]
	];

}
?>