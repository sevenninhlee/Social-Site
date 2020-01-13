<?php

class blogs_controller extends vendor_specific_controller {
	public function categories() {
		$this->_categories('blog');
	}
	public function category_add(){
		$this->_category_add('blog');
	}
	public function category_edit(){
		$this->_category_edit('blog');
	}
	public function comment_replies($id){
		$this->_comment_replies($id, 'blog');
	}
	public function add(){
		$this->_add('blog', isset($_POST['blog'])?$_POST['blog']:null);
	}
	public function view($id) {
		$this->_view($id, 'blog');
	}
	public function edit($id) {
		$this->_edit($id, 'blog', isset($_POST['blog'])?$_POST['blog']:null);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusBlogComment(){
		$this->_changeStatusComment('blog');
	}
	public function deleteBlogComment(){
		$this->_deleteComment('blog');
	}
	public function changeStatusManyBlogComment(){
		$this->_changeStatusManyComment('blog');
	}
	public function changeStatusBlogArticle(){
		$this->_changeStatusArticle('blog');
	}
	public function changeStatusBlogCategory(){
		$this->_changeStatusCategory('blog');
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function deleteBlogCategory(){
		$this->_deleteCategory('blog');
	}
	public function deleteBlogArticle(){
		$this->_deleteArticle('blog');
	}
	public function changeStatusManyBlogCategory(){
		$this->_changeStatusManyCategory('blog');
	}
	public function changeStatusManyBlogArticle(){
		$this->_changeStatusManyArticle('blog');
	}

	public function index() {
		global $app;
		$conditions = "";
		if(isset($app['prs']['author'])){
			$author = $app['prs']['author'];
			if($author != 'all')
			$conditions .= (($conditions)? " AND ":"")." user_id=".$author;
		}
		if(isset($app['prs']['category'])){
			$category = $app['prs']['category'];
			if($category != 'all')
			$conditions .= (($conditions)? " AND ":"")." categories_id=".$category;
		}
		if(isset($app['prs']['featured_blog'])){
			$featured_my_blog = $app['prs']['featured_blog'];
			if($featured_my_blog != 'all')
			$conditions .= (($conditions)? " AND ":"")." featured_my_blog=".$featured_my_blog;
		}
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." admin_status=".($status=='active'?1:0);
		}
		if(isset($app['prs']['search'])){
			$conditions .= (($conditions)? " AND (":"(").
			" title like '%".$app['prs']['search']."%' OR ".
			" blog_articles.slug like '%".$app['prs']['search']."%' OR ".
			" description like '%".$app['prs']['search']."%')";
		}

		$conditionsTmp = $conditions;
		$user = new user_model();
		$this->users = $user->getAllRecords('*', ['conditions'=>'']);
		$blogCategory = new blog_category_model();
		$this->categories = $blogCategory->getAllRecords('*', ['conditions'=>'']);
		$blog_article = new blog_article_model();
		$this->records = $blog_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['user', 'blog_category'], 'order'=>'id ASC']);
		$this->noActives = $blog_article->getCountRecords(['conditions'=>'admin_status=1']);

		$this->display();
	}
}

?>