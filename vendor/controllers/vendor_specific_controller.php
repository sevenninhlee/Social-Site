<?php

abstract class vendor_specific_controller extends vendor_backend_controller {
	public function _categories($ctl) {
		global $app;
		$conditions = "";
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
        }

		if(isset($app['prs']['search'])){
			$conditions .= (($conditions)? " AND (":"(").
			" name like '%".$app['prs']['search']."%')";
        }
        $model = $ctl.'_category_model';
		$modelCategory = new $model;
		$this->records = $modelCategory->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->noActives = $modelCategory->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}

	public function _category_add($ctl){
		global $app;
		$name = $app['prs']['name'];
        $slug = $app['prs']['slug'];
        $model = $ctl.'_category_model';
		$category = new $model;
		$categoryData['name'] = $name;
		$categoryData['slug'] = $slug;
		$categoryData['status'] = 1;
		$valid = $category->validator($categoryData);
		if($valid['status']) {
			if($category->addRecord($categoryData))
				header("Location: ".vendor_app_util::url(["ctl"=>"users"]));
			else {
				$this->errors = ['database'=>'An error occurred when inserting data! '. $category->errors['message']];
				$this->record = $categoryData;
			}
		} else {
			http_response_code(500);
			echo json_encode($category::convertErrorMessage($valid['message']));
			$this->errors = $category::convertErrorMessage($valid['message']);
			$this->record = $categoryData;
		}
	}

	public function _category_edit($ctl){
		global $app;
		$data['name'] = $_POST['name'];
		$data['slug'] = $_POST['slug'];
        $id = $app['prs']['id'];
        $model = $ctl.'_category_model';
		$category = new $model;
		$valid = $category->validator($data, $id);
		if($valid['status']) {
			if($category->editRecord($id, $data)) {
				$data = [
					'status' => true,
					'message' => 'Update successful!'
				];
				http_response_code(200);
				echo json_encode($data);
			} else {
				$data = [
					'status' => false,
					'error' => 'An error occurred when editing data!'
				];
				http_response_code(500);
				echo json_encode($data);
			}
		} else {
			http_response_code(200);
			$data = [
				'status' => false,
				'error' => $category::convertErrorMessage($valid['message'])
			];
			echo json_encode($data);
		}
	}

	//----------------------BLOG comment-------------------------------------------------------------------
	public function _comment_replies($id, $ctl){
        global $app;
        $model = $ctl.'_comment_model';
		$comments = new $model;
		$this->records = $comments->allp('*',['conditions'=>'parent_comment_id='.$id['1'], 'joins'=>['user'], 'order'=>'id ASC']);
		$this->noActives = $comments->getCountRecords(['conditions'=>'status=1 and parent_comment_id='.$id['1']]);
		$this->display();
	}

	public function _add($ctl, $post) {
		if(isset($_POST['btn_submit'])) {
            $modelArticle = $ctl.'_article_model';
			$bm = new $modelArticle;
			$ctlData = $post;
			$ctlData['user_id'] = $_SESSION['user']['id'];
			if($_FILES['image']['tmp_name'])
				$ctlData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($ctlData);
			if($valid['status']) {
				if($bm->addRecord($ctlData))
					header("Location: ".vendor_app_util::url(["ctl"=>$this->controller]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $ctlData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $ctlData;
			}
		}

        $conditions = '';
        $category = $ctl.'_category_model';
		$data = new $category;
		$this->categories = $data->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}

	//--------------------------------------------------------------------------

	public function _view($id, $ctl) {
        $conditions = '';
        
        $modelCategory = $ctl.'_category_model';
		$data = new $modelCategory;
        $this->categories = $data->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);

        $modelArticle = $ctl.'_article_model';
		$bm = new $modelArticle;
        $this->record = $bm->getRecord($id);
        $this->category = $data->getRecord($this->record['categories_id']);
        
        $modelComment = $ctl.'_comment_model';
		$comment = new $modelComment;
		$conditions = 'article_id='.$id.' and parent_comment_id=0';
		$this->comments = $comment->allp('*',['conditions'=>$conditions, 'joins'=>['user'], 'order'=>'id ASC']);
        $this->numComments = $comment->getCountRecords(['conditions'=>$conditions]);
        
        $modelLike = $ctl.'_like_model';
		$like = new $modelLike;
		$this->numLikes = $like->getCountRecords(['conditions'=>'article_id='.$id]);
		$this->display();
	}

	public function _edit($id, $ctl, $post=null) {

        $modelArticle = $ctl.'_article_model';
		$bm = new $modelArticle;
		$this->record = $bm->getRecord($id);
        $conditions = '';
        
        $modelCategory = $ctl.'_category_model';
		$ctl = new $modelCategory;
		$this->categories = $ctl->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);

		if(isset($_POST['btn_submit'])) {
			// $ctlData = $_POST[$ctl];
			$ctlData = $post;
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$ctlData['featured_image'] = $this->uploadImg($_FILES);
			}

			$valid = $bm->validator($ctlData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $ctlData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>$this->controller]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $ctlData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $ctlData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	public function _changeStatusComment($ctl)
	{
		global $app;
        $id = $app['prs']['id'];
        $modelComment = $ctl.'_comment_model';
		$comment = new $modelComment;
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $comment);
	}

	public function _deleteComment($ctl)
	{
		global $app;
        $ids = $app['prs']['id'];
        $modelComment = $ctl.'_comment_model';
		$comment = new $modelComment;
		$this->handleDeleteMany($ids, $comment);
	}

	public function _changeStatusManyComment($ctl)
	{
		global $app;
		$ids = $app['prs']['id'];
        $modelComment = $ctl.'_comment_model';
		$comment = new $modelComment;
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $comment);
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function _changeStatusArticle($ctl)
	{
		global $app;
        $id = $app['prs']['id'];
        $modelArticle = $ctl.'_article_model';
		$article = new $modelArticle;
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $article);
	}

	public function _changeStatusCategory($ctl)
	{
		global $app;
        $id = $app['prs']['id'];
        $modelCategory = $ctl.'_category_model';
		$category = new $modelCategory;
		$data = [
			'status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $category);
	}

	public function changeStatus($id, $dataRecord, $model) {
		if($model->editRecord($id, $dataRecord)){
			$data = [
				'status' => true,
				'message' => 'Change status successful!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => false,
				'error' => 'An error occurred when Edit data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

	// ////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function _deleteCategory($ctl)
	{
		global $app;
        $ids = $app['prs']['id'];
        $modelCategory = $ctl.'_category_model';
		$category = new $modelCategory;
		$this->handleDeleteMany($ids, $category);
		$modelArticle = $ctl.'_article_model';
		$category = new $modelArticle;
		$category->setToUnknownCategories($ids);
	}

	public function _deleteArticle($ctl)
	{
		global $app;
        $ids = $app['prs']['id'];
        $modelArticle = $ctl.'_article_model';
		$article = new $modelArticle;
		$this->handleDeleteMany($ids, $article);
	}

	public function handleDeleteMany($ids, $model) {
		if ($model->delRelativeRecords($ids)){
			$data = [
				'status' => true,
				'message' => 'Delete successful!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => false,
				'error' => 'An error occurred when delete data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

	public function _changeStatusManyCategory($ctl)
	{
		global $app;
        $ids = $app['prs']['id'];
        $modelCategory = $ctl.'_category_model';
		$category = new $modelCategory;
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $category);
	}

	public function _changeStatusManyArticle($ctl)
	{
		global $app;
        $ids = $app['prs']['id'];
        $modelArticle = $ctl.'_article_model';
		$article = new $modelArticle;
		$data = [
			'admin_status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $article);
	}

	public function changeStatusMany($ids, $dataRecord, $model) {
		$ids = explode(",",$ids);
		if( !empty($ids) && count($ids) > 0 ) {
			foreach ($ids as $id) {
				$model->editRecord($id, $dataRecord);
			}
			$data = [
				'status' => true,
				'message' => 'Edit successful!'
			];
			http_response_code(200);
			echo json_encode($data);	
		} else {
			$data = [
				'status' => false,
				'error' => 'An error occurred when edit data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}
}

?>