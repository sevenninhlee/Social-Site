<?php
class bookshelf_book_controller extends aside_bar_data_controller
{
	public function index()
	{
		$bm = new book_article_model();
		$rtm = new review_rating_model();
		$book = new book_category_model();
		$this->categories = $book->all('*',['conditions'=>'', 'joins'=>false, 'order'=>'id ASC']);
		$this->records = $bm->all('book_articles.*, book_categories.name',['conditions'=>'', 'joins'=>['book_category']]);
		foreach ($this->records as $key => $record) {
			$this->records[$key]['AvrRating'] = $rtm->getAverageRating($record['id'], 'book_article_model');
		}
		$status_name = 'owner_status';
		$act = new action_model();
		$this->actionFavorite = $act->getAllAction('book_articles', 'book_article_model', 'favorite', $status_name);
		$this->actionRecommanded = $act->getAllAction('book_articles', 'book_article_model', 'recommanded', $status_name);
		$this->actionCurrent = $act->getAllAction('book_articles', 'book_article_model', 'current', $status_name);
		
		$rvm = new review_rating_model();
		$user_id = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
		$this->revRecords = $rvm->getUserReviews('book_articles', $user_id, 'book_article_model', 'owner_status');
		
		if(isset($_POST['btn_submit'])) {
			$actm = new action_model();
			$bm = new book_article_model();
			$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
			$dataSearch = $_POST['book'];
			$action = trim($_POST['action'], " ");
			if( $_POST['alt'] === 'edit-search-google') {
				$bookData = $bm->getRecordWhere([
					'ISBN' => $dataSearch['ISBN'],
				]);
				if(empty($bookData)) {
					$bcm = new book_category_model();
					if($bcm->isCategory($dataSearch['book_categories_name'])){
						$getCategory = $bcm->getRecordWhere([
							'name' => $dataSearch['book_categories_name']
						]);
						$dataSearch['categories_id'] = $getCategory['id'];
					}else {
						$categoryData['name'] = $dataSearch['book_categories_name'];
						$categoryData['slug'] = vendor_app_util::gen_slug($categoryData['name']);
						$categoryData['status'] = 1;
						$dataSearch['categories_id'] = $bcm->addRecord($categoryData);
					}
					$dataSearch['user_id'] = $userID;
					$dataSearch['year'] = explode("-",$dataSearch['year'])[0];
					$dataSearch['slug'] = vendor_app_util::gen_slug($dataSearch['title']);
					if(!empty($dataSearch['img_search_api'])) {
						$dataSearch['featured_image'] = $dataSearch['img_search_api'];
					}

					if($_FILES['image']['tmp_name']) {
						$dataSearch['featured_image'] = $this->uploadImg($_FILES);
					}
					$valid = $bm->validator($dataSearch);
					unset($dataSearch['category_search_api']);
					unset($dataSearch['img_search_api']);
					unset($dataSearch['book_categories_name']);
					$dataSearch['id'] = $bm->addRecord($dataSearch);
				} else {
					$dataSearch['id'] = $bookData['id'];
				}
			}
			$dataRecord = [
				'user_id' => $userID,
				'object_article_id' => $dataSearch['id'],
				'table_model' => 'book_article_model',
				$action => 1,
			];
			$checkData = $actm->getRecordWhere([
				'object_article_id' => $dataSearch['id'],
				$action => 1,
				'user_id' => $_SESSION['user']['id']
			]);
			if(empty($checkData)){
				if($actm->addRecord($dataRecord)){
					$newRecord = $actm->getRecordWhere([
						'object_article_id' => $dataSearch['id'],
						$action => 1,
						'user_id' => $_SESSION['user']['id']
					]);
					if($_POST['alt'] === 'edit-search-google'){
						header("Location: ".vendor_app_util::url(["ctl"=>"bookshelf_book"]));
					}
				} else {
					if($_POST['alt'] === 'edit-search-google'){
						$this->errors = ['message'=>'An error occurred when Edit data!'];
					}
				}
			} 
			else {
				if($_POST['alt'] === 'edit-search-google'){
					$this->errors = ['message'=>'This data was added. Please, select a item to new add!'];
				}
			}
		}
		$this->display();
	}

	public function view(){
		$condition = '';
		$status_name = 'owner_status';
		$user_id = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;

		$am = new action_model();
		$this->records = $am->getActionStatus('book_articles', 'book_article_model', 'current', 1, $user_id, $status_name);
		$this->recRecords = $am->getActionStatus('book_articles', 'book_article_model', 'recommanded', 1, $user_id, $status_name);
		$this->favRecords = $am->getActionStatus('book_articles', 'book_article_model', 'favorite', 1, $user_id, $status_name);

		$rvm = new review_rating_model();
		$this->revRecords = $rvm->getUserReviewModel('book_articles', $user_id, 'book_article_model', 1, 'owner_status');

		$this->display();

	}
	
	public function deleteBookArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new action_model();
		$this->handleDeleteMany($ids, $article);
	}

	public function deleteBookShelfRv()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new review_rating_model();
		$this->handleDeleteMany($ids, $article);
	}

	public function handleDeleteMany($ids, $model) {
		if ($model->delRelativeRecords($ids, null, $this->controller)){
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


	public function edit_reviewbook($id) {
		global $app;
		$conditions = '';
		$this->idObject = $id[1];

		$bm = new book_article_model();
		$this->record = $bm->getRecord($id);
		$book = new book_category_model();
		$this->category = $book->getRecord($this->record['categories_id']);
		
		$reviews = new review_rating_model();
		$this->getAveRating = $reviews->getAverageRating($id[1], "book_article_model");
		$this->reviewUser = $reviews->getRecord($id[2]);
		// echo "Start <br/>"; echo '<pre>'; print_r($this->idObject);echo '</pre>';exit("End Data");

		$this->display();
	}

	public function saveData()
	{
		$actm = new action_model();
		$bm = new book_article_model();
		$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$dataSearch = $_POST['book'];
		$action = trim($_POST['action'], " ");
		if( $_POST['alt'] === 'edit-search-google') {
			$bookData = $bm->getRecordWhere([
				'ISBN' => $dataSearch['ISBN'],
			]);
			if(empty($bookData)) {
				$bcm = new book_category_model();
				if($bcm->isCategory($dataSearch['book_categories_name'])){
					$getCategory = $bcm->getRecordWhere([
						'name' => $dataSearch['book_categories_name']
					]);
					$dataSearch['categories_id'] = $getCategory['id'];
				}else {
					$categoryData['name'] = $dataSearch['book_categories_name'];
					$categoryData['slug'] = vendor_app_util::gen_slug($categoryData['name']);
					$categoryData['status'] = 1;
					$dataSearch['categories_id'] = $bcm->addRecord($categoryData);
				}
				$dataSearch['user_id'] = $userID;
				$dataSearch['year'] = explode("-",$dataSearch['year'])[0];
				$dataSearch['slug'] = vendor_app_util::gen_slug($dataSearch['title']);
				if(!empty($dataSearch['img_search_api'])) {
					$dataSearch['featured_image'] = $dataSearch['img_search_api'];
				}

				if($_FILES['image']['tmp_name']) {
					$dataSearch['featured_image'] = $this->uploadImg($_FILES);
				}
				$valid = $bm->validator($dataSearch);
				unset($dataSearch['category_search_api']);
				unset($dataSearch['img_search_api']);
				unset($dataSearch['book_categories_name']);
				$dataSearch['id'] = $bm->addRecord($dataSearch);
			} else {
				$dataSearch['id'] = $bookData['id'];
			}
		}

		$dataRecord = [
			'user_id' => $userID,
			'object_article_id' => $dataSearch['id'],
			'table_model' => 'book_article_model',
			$action => 1,
		];
		$checkData = $actm->getRecordWhere([
			'object_article_id' => $dataSearch['id'],
			$action => 1,
			'user_id' => $_SESSION['user']['id']
		]);
		if(empty($checkData)){
			if($actm->addRecord($dataRecord)){
				$newRecord = $actm->getRecordWhere([
					'object_article_id' => $dataSearch['id'],
					$action => 1,
					'user_id' => $_SESSION['user']['id']
				]);
				$data = [
					'status' => 1,
					'message' => 'Add actions successful!',
					'newRecord' => $newRecord,
				];
				if($_POST['alt'] === 'edit-search-google'){
					header("Location: ".vendor_app_util::url(["ctl"=>"bookshelf_book"]));
				}else {
					http_response_code(200);
					echo json_encode($data);	
				}
			} else {
				$data = [
					'status' => 0,
					'message' => 'An error occurred when Edit data!'
				];
				http_response_code(200);
				echo json_encode($data);
			}
		} 
		else {
			$data = [
				'status' => 0,
				'message' => 'This data was added. Please, select a item to new add!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

	public function changeOwnerStatus()
	{
		$dataRecord = [
			'owner_status' => $_POST['status']
		];
		if(trim($_POST['title'], " ") == 'book_reviews') {
			$actm = new review_rating_model();
		} else {
			$actm = new action_model();
		}

		if($actm->editRecord($_POST['id'], $dataRecord)){
			$data = [
				'status' => 1,
				'message' => 'Change status successful!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => 0,
				'error' => 'An error occurred when Edit data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}
}
?>