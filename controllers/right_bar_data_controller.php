<?php
class right_bar_data_controller extends vendor_main_controller
{
	public function __construct() {
		
		global $app;
		(substr($app['ctl'], -1) === 's') ? $ctl = substr($app['ctl'], 0, -1) : $ctl = $app['ctl'];
		switch ($ctl) {
		 	case 'book':
		 		$category_model = new book_category_model();
		 		$this->dataCategories = $category_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
		 		break;

		 	case 'book_group':
		 		$category_model = new book_category_model();
		 		$this->dataCategories = $category_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
		 		break;
		 	
		 	case 'blog':
				$category_model = new blog_category_model();
				$this->dataCategories = $category_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
				 break;

			case 'community_blog':
				$category_model = new blog_category_model();
				$this->dataCategories = $category_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
				break;

		 	case 'film':
				$category_model = new film_category_model();
				$this->dataCategories = $category_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
				break;

		 	case 'new':
		 		$category_model = new new_category_model();
				$this->dataCategories = $category_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
		 		break;

		 	case 'opinions_debate':
		 		$opinion_debate_model = new opinion_debate_category_model();
				$this->dataCategories = $opinion_debate_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
				break;
			
			case 'querie':
		 		$queries_model = new queries_category_model();
				$this->dataCategories = $queries_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
				break;
			
			case 'election_central':
		 		$election_central_model = new election_central_category_model();
				$this->dataCategories = $election_central_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
				break;
			
			case 'must_read':
		 		$must_reads_model = new must_reads_category_model();
				$this->dataCategories = $must_reads_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
				break;
				 
			case 'environment':
		 		$environment_model = new environment_category_model();
				$this->dataCategories = $environment_model->all('*',['conditions'=>'status=1', 'joins'=>false, 'order'=> ' name ASC ']);
		 		break;
		 		
		 	default:
		 		// code...
		 		break;
		}

		parent::__construct();
  }
}
?>
