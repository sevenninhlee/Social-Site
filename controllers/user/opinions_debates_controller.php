<?php
class opinions_debates_controller extends aside_bar_data_controller
{
	public function __construct()
	{
		$category_model = new opinion_debate_category_model();
		$this->dataCategories = $category_model->all('*',['conditions'=>'', 'joins'=>false, 'order'=> ' name ASC ']);
		parent::__construct();
	}
	
	public function index()
	{
		$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$conditionsTmp = "user_id = {$userID}";
		$opinion_debate_article = new opinion_debate_article_model();
		$obj_cat = new opinion_debate_category_model();
		$this->records = $opinion_debate_article->allp('*',['conditions'=>$conditionsTmp, 'joins'=>['opinion_debate_categories'], 'order'=>'updated DESC']);
		foreach($this->records['data'] as $key => $record) {
			$obj_review_rating = new review_rating_model();
       		$data = $obj_review_rating->count($record['id'],"opinion_debate_article_model");
       		$number_comment = $opinion_debate_article->getCountComment($record['id']);
			// $cat = $obj_cat->getRecord($record['categories_id']);
			$this->records['data'][$key]['number_like'] = $data['total_likes'];
			$this->records['data'][$key]['number_comment'] = $number_comment;
			$this->records['data'][$key]['ListCate'] = $obj_cat->getCatOfOpinion($record['categories_arr']);
		}
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new opinion_debate_article_model();
			$odData = $_POST['opinion_debate'];
			if(isset($_POST['categories_arr'])){
				$odData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$odData['categories_arr'] = ',0,';
			}
			$odData['categories_id'] = 1;
			$odData = string_helper_model::processForm($odData);
			$odData['user_id'] = $_SESSION['user']['id'];
			$odData['featured_my_opinion_debate'] = 1;
			$odData['admin_status'] = 0;
			if($_FILES['image']['tmp_name'])
				$odData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($odData);
			if($valid['status']) {
				if($bm->addRecord($odData)){
					$notify = new notify_content_model();
					$dataNoti = [
						'user_id' => $_SESSION['user']['id'],
						'description' => 'A post has created by '.vendor_html_helper::showUserName($_SESSION['user']),
						'action_id' => 0,
						'link' => 'admin/opinions_debates/index',
					];
					if ($notify->addRecord($dataNoti) )
						header("Location: ".vendor_app_util::url(["area" => "user","ctl"=>"opinions_debates"]));
				}
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $odData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $odData;
			}
		}

		$opinion_debate_category = new opinion_debate_category_model();
		$this->categories = $opinion_debate_category->all('*',['conditions'=>'', 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}

	public function edit($id) {
		$conditions = '';
		$opinion_debate = new opinion_debate_category_model();
		$this->categories = $opinion_debate->all('*',['conditions'=>$conditions, 'joins'=>false, 'order'=>'id ASC']);
		$bm = new opinion_debate_article_model();
		$this->record = $bm->getRecord($id);
		$this->category = $opinion_debate->getCatOfOpinion($this->record['categories_arr']);
		if(isset($_POST['btn_submit'])) {
			$opinion_debateData = $_POST['opinion_debate'];
			if(isset($_POST['categories_arr'])){
				$opinion_debateData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$opinion_debateData['categories_arr'] = ',0,';
			}
			$opinion_debateData['categories_id'] = 1;
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$opinion_debateData['featured_image'] = $this->uploadImg($_FILES);
			}
			$valid = $bm->validator($opinion_debateData, $id);
			if($valid['status']) {
				if($bm->editRecord($id, $opinion_debateData)) {
					header("Location: ".vendor_app_util::url(["area" => "user","ctl"=>"opinions_debates"]));
				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bm->errors['message']];
					$this->record = $opinion_debateData;
				}
			} else {

				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $opinion_debateData;
				$this->record['id'] = $id;
			}
		}
		$this->display();
	}

	public function deleteOpinionArticle()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new opinion_debate_article_model();
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
		$opinion_debate_article = new opinion_debate_article_model();
		$dataRecord = [
			'owner_status' => $_POST['owner_status']
		];
		if($opinion_debate_article->editRecord($_POST['opinion_debate_article'], $dataRecord)){
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