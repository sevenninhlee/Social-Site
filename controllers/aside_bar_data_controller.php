<?php
class aside_bar_data_controller extends users_controller
{
	public function __construct() {
		
		$conditions = 'admin_status = 1 AND owner_status = 1';
		$opimd = new opinion_debate_article_model();
		$this->opinion = $opimd->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC LIMIT 0,1']);
		$bookmd = new book_article_model();
		$this->book = $bookmd->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC LIMIT 0,1']);
		$blogmd = new blog_article_model();
		$this->blog = $blogmd->all('*',['conditions'=>$conditions.' AND featured_my_blog = 1', 'joins'=>false, 'order'=> ' created DESC LIMIT 0,1']);
		$querymd = new queries_article_model();
		$this->query = $querymd->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC LIMIT 0,1']);

		parent::__construct();
	}
}
?>
