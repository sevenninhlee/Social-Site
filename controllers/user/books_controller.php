<?php
class books_controller extends aside_bar_data_controller
{
	public function __construct()
	{
		$category_model = new book_category_model();
		$this->dataCategories = $category_model->all('*',['conditions'=>'', 'joins'=>false, 'order'=> ' name ASC ']);
		parent::__construct();
	}
	
	public function index()
	{
		$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$conditionsTmp = "user_id = {$userID} AND  admin_status = 1  AND  owner_group_status = 0";
		$book_article = new book_article_model();
		$bCategory = new book_category_model();
		$this->records = $book_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['book_category'], 'order'=>'created DESC']);
		if(!empty($this->records['data'])){
		foreach($this->records['data'] as $key => $record) {
			$this->records['data'][$key]['ListCate'] = $bCategory->getCatOfBook($record['categories_arr']);
		}
		}
		$this->display();
	}

	public function add() {
		$conditions = '';
		$bcm = new book_category_model();
		$bm = new book_article_model();
		$this->categories = $bcm->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->records = $bm->all('book_articles.*, book_categories.name',['conditions'=>'', 'joins'=>['book_category']]);
		if(isset($_POST['btn_submit'])) {
			$bm = new book_article_model();
			$bookData = $_POST['book'];
			$bookData['user_id'] = $_SESSION['user']['id'];
			$bookData['slug'] = vendor_app_util::gen_slug($bookData['title']);

			if(isset($_POST['categories_arr'])){
				$bookData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$bookData['categories_arr'] = ',0,';
			}
			$bookData['categories_id'] = 1;

			if(!empty($bookData['img_search_api'])) {
				$bookData['featured_image'] = $bookData['img_search_api'];
			}

			if($bookData['year'])
			{
				$bookData['year'] = explode("-",$bookData['year'])[0];
			}

			if($_FILES['image']['tmp_name']) {
				$bookData['featured_image'] = $this->uploadImg($_FILES);
			}
			$valid = $bm->validator($bookData);
			unset($bookData['category_search_api']);
			unset($bookData['img_search_api']);
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
		$this->display();
	}

	public function edit($id) {
		$bm = new book_article_model();
		$this->record = $bm->getRecord($id);
		$conditions = '';
		$book = new book_category_model();
		$book_article = $bm->allp('*',['conditions'=>'id='.$id, 'joins'=>false, 'order'=>'id ASC']);

		$this->categories = $book->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->category = $book->getCatOfBook($book_article['data'][0]['categories_arr']);

		if(isset($_POST['btn_submit'])) {
			$bookData = $_POST['book'];
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$bookData['featured_image'] = $this->uploadImg($_FILES);
			}
			$valid = $bm->validator($bookData, $id);
			// unset($bookData['category_search_api']);
			if(isset($_POST['categories_arr'])){
				$bookData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$bookData['categories_arr'] = ',0,';
			}
			$bookData['categories_id'] = 1;

			unset($bookData['img_search_api']);
			if($valid['status']) {
				if($bm->editRecord($id, $bookData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"books"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $bookData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				// $this->record = $bookData;
				// $this->record['id'] = $id;
			}
		}
		$this->display();
	}

	public function deleteBookArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_article_model();
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

	public function changeOwnerStatus()
	{
		$book_article = new book_article_model();
		$dataRecord = [
			'owner_status' => $_POST['owner_status']
		];
		if($book_article->editRecord($_POST['book_article'], $dataRecord)){
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

	function gen_slug($str) {
		$a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
		$b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
		return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
	}
}
?>