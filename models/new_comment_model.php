<?php
class new_comment_model extends vendor_frap_model
{
	public $nopp = 10;
	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],
			['blog_article', 'key'=>'categories_id']			
		]
	];

	public function rules() {
		global $app;
	    return [
			'content' => ['string', ['min', 'value'=>1]],
	    ];
	}
	
}
?>