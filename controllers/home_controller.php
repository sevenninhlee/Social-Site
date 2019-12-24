<?php
class home_controller extends vendor_main_controller {
	protected 	$errors = false;
	public function index() 
	{
		// $film_article = new film_article_model();
		$blog_article = new blog_article_model();
		// $book_group_article = new book_group_article_model();
		$mnew = new new_article_model();
		$melection_central_article = new election_central_article_model();
		$mmust_reads_article = new must_reads_article_model();
		$menvironment_article = new environment_article_model();

		// $this->film_articles = $film_article->getFourRecord();
		$this->blog_articles = $blog_article->getFourRecord(' AND featured_my_blog = 1 ');
		// $this->book_group_articles = $book_group_article->getFourRecord();

		$conditions = 'admin_status = 1 AND owner_status = 1 AND add_homepage = 1';
		$mbook_group_article_model = new book_group_article_model();
		$this->book_group_articles = $mbook_group_article_model->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC']);
		$mfilm_articles = new film_article_model();
		$this->film_articles = $mfilm_articles->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC']);
		$opimd = new opinion_debate_article_model();
		$this->opinion = $opimd->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC ']);
		$bookmd = new book_article_model();
		$this->book = $bookmd->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC ']);
		// $blogmd = new blog_article_model();
		// $this->blog_articles = $blogmd->all('*',['conditions'=>$conditions.' AND featured_my_blog = 1', 'joins'=>false, 'order'=> ' created DESC LIMIT 0,1']);
		$querymd = new queries_article_model();
		$this->query = $querymd->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC ']);
		$this->listNew = $mnew->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC ']);
		$this->listElectionCentralArticle = $melection_central_article->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC']);
		
		// echo "Start <br/>"; echo '<pre>'; print_r($this->listNew);echo '</pre>';exit("End Data");
		
		$this->listMustReadsArticle = $mmust_reads_article->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC']);
		$this->listEnvironmentArticle = $menvironment_article->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=> ' created DESC']);
		$this->display();
	} 
}
?>