<?php
class queries_controller extends aside_bar_data_controller
{
	public function __construct()
	{
		$category_model = new queries_category_model();
		$this->dataCategories = $category_model->all('*',['conditions'=>'', 'joins'=>false, 'order'=> ' name ASC ']);
		parent::__construct();
	}
	
	public function index()
	{
		$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$conditionsTmp = "user_id = {$userID}";
		$queries_article = new queries_article_model();
		$queries_cat = new queries_category_model();
		$this->records = $queries_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>null, 'order'=>'created DESC']);
		
		if(!empty($this->records['data'])){
			$review_rating = new review_rating_model();
			$this->records = $review_rating->getTotalAll($this->records, "queries_article_model");
			foreach($this->records['data'] as $key => $record) {
				$this->records['data'][$key]['ListCate'] = $queries_cat->getCatOfQueries($record['categories_arr']);
			}
		}
		$this->display();
	}
	
	public function add() {
		$conditions = '';
		$bcm = new queries_category_model();
		$this->categories = $bcm->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		
		if(isset($_POST['btn_submit'])) {
			$bm = new queries_article_model();
			$queriesData = $_POST['queries'];
			if(isset($_POST['categories_arr'])){
				$queriesData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$queriesData['categories_arr'] = ',0,';
			}
			$queriesData['categories_id'] = 1;
			$queriesData['user_id'] = $_SESSION['user']['id'];
			$queriesData['admin_status'] = 0;
			// queriesData['slug'] = vendor_app_util::gen_slug($queriesData['title']);
			if($_FILES['image']['tmp_name']) {
				$queriesData['featured_image'] = $this->uploadImg($_FILES);
			}
			$valid = $bm->validator($queriesData);
			if($valid['status']) {
				if($bm->addRecord($queriesData)){
					$notify = new notify_content_model();
					$dataNoti = [
						'user_id' => $_SESSION['user']['id'],
						'description' => 'A post has created by '.$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'],
						'action_id' => 0,
						'link' => 'admin/queries/index',
					];
					if ($notify->addRecord($dataNoti) )
						header("Location: ".vendor_app_util::url(["ctl"=>"queries"]));
				}else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $queriesData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $queriesData;
			}
		}
		$this->display();
	}
	
	public function edit($id) {
		$bm = new queries_article_model();
		$this->record = $bm->getRecord($id);
		$conditions = '';
		$queries = new queries_category_model();
		$this->categories = $queries->allp('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$this->category = $queries->getCatOfQueries($this->record['categories_arr']);
		if(isset($_POST['btn_submit'])) {
			$queriesData = $_POST['queries'];
			if(isset($_POST['categories_arr'])){
				$queriesData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$queriesData['categories_arr'] = ',0,';
			}
			$queriesData['categories_id'] = 1;
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$queriesData['featured_image'] = $this->uploadImg($_FILES);
			}

			$valid = $bm->validator($queriesData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $queriesData)) {
					header("Location: ".vendor_app_util::url(["ctl"=>"queries"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $queriesData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $queriesData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	public function deleteQueriesArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new queries_article_model();
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

	public function changeOwnerStatus()
	{
		$queries_article = new queries_article_model();
		$dataRecord = [
			'owner_status' => $_POST['owner_status']
		];
		if($queries_article->editRecord($_POST['queries_article'], $dataRecord)){
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