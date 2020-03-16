<?php

class books_controller extends vendor_backend_controller {
	public function categories() {
		global $app;
		$conditions = "";
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." status=".($status=='active'?1:0);
		}
		if(isset($app['prs']['search'])){
			$search = $app['prs']['search'];
			$search = string_helper_model::process($search);
			$conditions .= (($conditions)? " AND (":"(").
			" name like '%".$search."%')";
		}
		$book = new book_category_model();
		$this->records = $book->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->noActives = $book->getCountRecords(['conditions'=>'status=1']);
		$this->display();
	}


	public function category_add(){
		global $app;
		$name = $app['prs']['name'];
		$slug = $app['prs']['slug'];
		$category = new book_category_model();
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

	public function category_edit(){
		global $app;
		$data['name'] = $_POST['name'];
		$data['slug'] = $_POST['slug'];
		$id = $app['prs']['id'];
		$category = new book_category_model();
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


	//----------------------BOOK comment-------------------------------------------------------------------
	public function comment_replies($id){
		global $app;
		$review_rating = new review_rating_model();
		$this->records = $review_rating->getAllCommentsReplies($id['1']);
		http_response_code(200);
		echo json_encode($this->records);
	}

	// public function comment_replies_del($id) {
	// 	$comment = new book_comment_reply_model();
	// 	if($comment->delRelativeRecord($id['1'])) {
	// 		echo "Delete Successful";
	// 	}
	// 	else echo "error";
	// }

	// public function comment_replies_delmany($ids){
	// 	global $app;
	// 	$ids = $app['prs']['ids'];
	// 	$comment = new book_comment_reply_model();
	// 	if($comment->delRelativeRecords($ids)) {
	// 		echo "Delete many successful";
	// 	}
	// 	else echo "error";
	// }


	//-----------------------BOOK---------------------------------------------------------------------------

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
			// $conditions .= (($conditions)? " AND ":"")." categories_arr like '%,".$category.",%'";
			$conditions .= (($conditions)? " AND ":"")." categories_id=".$category;
		}
		if(isset($app['prs']['status'])){
			$status = $app['prs']['status'];
			if($status == 'active' || $status == 'disable')
			$conditions .= (($conditions)? " AND ":"")." admin_status=".($status=='active'?1:0);
		}
		if(isset($app['prs']['search'])){
			$search = $app['prs']['search'];
			$search = string_helper_model::process($search);
			$conditions .= (($conditions)? " AND (":"(").
			" title like '%".$search."%' OR ".
			" book_articles.slug like '%".$search."%' OR ".
			" description like '%".$search."%')";
		}

		$conditionsTmp = $conditions;
		$user = new user_model();
		$this->users = $user->getAllRecords('*', ['conditions'=>'']);
		$bookCategory = new book_category_model();
		$this->categories = $bookCategory->getAllRecords('*', ['conditions'=>'']);
		$book_article = new book_article_model();
		$this->records = $book_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['user','book_category'], 'order'=>'created DESC']);
		foreach ($this->records['data'] as $key => $record) {
			$this->records['data'][$key]['ListCate'] = $bookCategory->getCatOfBook($record['categories_arr']);
		}
		$this->noActives = $book_article->getCountRecords(['conditions'=>'admin_status=1']);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new book_article_model();
			$bookData = $_POST['book'];
			$bookData['featured_my_book'] = 1;
			if(isset($_POST['categories_arr'])){
				$bookData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$bookData['categories_arr'] = ',0,';
			}
			$bookData['categories_id'] = 1;
			$bookData = string_helper_model::processForm($bookData);
			$bookData['user_id'] = $_SESSION['user']['id'];
			// $bookData['slug'] = gen_slug($_POST['book']['title']);
			if($_FILES['image']['tmp_name'])
				$bookData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($bookData);
			if($valid['status']) {
				if($bm->addRecord($bookData))
					header("Location: ".vendor_app_util::url(["ctl"=>"books"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $bookData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $bookData;
			}
		}

		$conditions = '';
		$book = new book_category_model();
		$this->categories = $book->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}


	//--------------------------------------------------------------------------

	public function view($id) {
		$conditions = '';
		$book = new book_category_model();
		$this->categories = $book->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new book_article_model();
		$book_article = $bm->allp('*',['conditions'=>'id='.$id, 'joins'=>false, 'order'=>'id ASC']);
		// $this->category = $book->getRecord($book_article['data'][0]['categories_id']);
		$this->category = $book->getRecord($this->record['categories_id']);
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'book_article_model');
		$review_rating = new review_rating_model();
		$this->record = $review_rating->getTotalAll($book_article, "book_article_model");
		$this->display();
	}

	public function edit($id) {
		global $app;
		$conditions = '';
		$book = new book_category_model();
		$this->categories = $book->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new book_article_model();
		$book_article = $bm->allp('*',['conditions'=>'id='.$id, 'joins'=>false, 'order'=>'id ASC']);
		$this->category = $book->getCatOfBook($book_article['data'][0]['categories_arr']);
		$review_rating = new review_rating_model();
		$this->comments = $review_rating->getAllComments($id, 'book_article_model');
		$review_rating = new review_rating_model();
		$this->record = $review_rating->getTotalAll($book_article, "book_article_model");

		if(isset($_POST['btn_submit'])) {
			$bookData = $_POST['book'];
			if(isset($_POST['categories_arr'])){
				$bookData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$bookData['categories_arr'] = ',0,';
			}
			$bookData['categories_id'] = 1;
			$bookData = string_helper_model::processForm($bookData);
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$bookData['featured_image'] = $this->uploadImg($_FILES);
			}

			$valid = $bm->validator($bookData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $bookData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"books"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $bookData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $bookData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusBookComment()
	{
		global $app;
		$id = $app['prs']['id'];
		$comment = new review_rating_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $comment);
	}

	// public function changeStatusBookCommentReply()
	// {
	// 	global $app;
	// 	$id = $app['prs']['id'];
	// 	$commentRelpy = new book_comment_reply_model();
	// 	$data = [
	// 		'admin_status' => $_POST['status']
	// 	];
	// 	$this->changeStatus($id, $data, $commentRelpy);
	// }

	public function deleteBookComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$bookComment = new review_rating_model();
		$this->handleDeleteMany($ids, $bookComment);
	}

	// public function deleteBookCommentReply()
	// {
	// 	global $app;
	// 	$ids = $app['prs']['id'];
	// 	$bookCommentReply = new book_comment_reply_model();
	// 	$this->handleDeleteMany($ids, $bookCommentReply);
	// }

	public function changeStatusManyBookComment()
	{
		global $app;
		$ids = $app['prs']['id'];
		$bookComment = new review_rating_model();
		$data = [
			'admin_status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $bookComment);
	}

	// public function changeStatusManyBookCommentReply()
	// {
	// 	global $app;
	// 	$ids = $app['prs']['id'];
	// 	$bookCommentReply = new book_comment_reply_model();
	// 	$data = [
	// 		'status' => (int)$_POST['status']
	// 	];
	// 	$this->changeStatusMany($ids, $data, $bookCommentReply);
	// }

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function changeStatusBookArticle()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new book_article_model();
		$data = [
			'admin_status' => $_POST['status']
		];
		$this->changeStatus($id, $data, $article);
	}

	public function changeStatusBookCategory()
	{
		global $app;
		$id = $app['prs']['id'];
		$category = new book_category_model();
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
	public function deleteBookCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new book_category_model();
		$this->handleDeleteMany($ids, $category);
		$category = new book_article_model();
		$category->setToUnknownCategories($ids);
	}

	public function deleteBookArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_article_model();
		$this->handleDeleteMany($ids, $article);
	}

	public function handleDeleteMany($ids, $model) {
		if ($model->delRelativeRecords($ids, null, $this->controller)){
      if($this->deleteReviewRatingRl($ids)){
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

		} else {
			$data = [
				'status' => false,
				'error' => 'An error occurred when delete data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

  public function deleteReviewRatingRl($ids){
    $arr_ids = explode(",", $ids);
    $article = new review_rating_model();
    foreach ($arr_ids as $value) {
      $article->delRecordByCond(" object_article_id = {$value} AND table_model = 'book_article_model'");
    }
    return true;
  }

	public function changeStatusManyBookCategory()
	{
		global $app;
		$ids = $app['prs']['id'];
		$category = new book_category_model();
		$data = [
			'status' => (int)$_POST['status']
		];
		$this->changeStatusMany($ids, $data, $category);
	}

	public function changeStatusManyBookArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_article_model();
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