<?php
class book_groups_controller extends aside_bar_data_controller
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
		$bgm = new book_group_article_model();
		$bCategory = new book_category_model();
		$this->getIsOrganizer = $bgm->getBookGroupIsOrganizer($userID);
		foreach($this->getIsOrganizer['data'] as $key => $record) {
			$this->getIsOrganizer['data'][$key]['ListCate'] = $bCategory->getCatOfBook($record['categories_arr']);
		}		
		$userbg = new book_group_article_user_model();
		$this->getIsMember = $userbg->getBookGroupIsMember($userID);
		$this->display();
	}

	public function add() {
		if(isset($_POST['btn_submit'])) {
			$bm = new book_group_article_model();
			$grBookData = $_POST['book_group'];
			if(isset($_POST['categories_arr'])){
				$grBookData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$grBookData['categories_arr'] = ',0,';
			}
			$grBookData['categories_id'] = 1;
			// $grBookData = string_helper_model::processForm($grBookData);
			$grBookData['user_id'] = $_SESSION['user']['id'];
			if($_FILES['image']['tmp_name'])
				$grBookData['featured_image'] = $this->uploadImg($_FILES);
			$valid = $bm->validator($grBookData);
			if($valid['status']) {
				if($bm->addRecord($grBookData))
					header("Location: ".vendor_app_util::url(["ctl"=>"book_groups"]));
				else {
					$this->errors = ['database'=>'An error occurred when inserting data! '. $bm->errors['message']];
					$this->record = $grBookData;
				}
			} else {
				$this->errors = $bm::convertErrorMessage($valid['message']);
				$this->record = $grBookData;
			}
		}

		$book_group_article = new book_category_model();
		$this->categories = $book_group_article->all('*',['conditions'=>'', 'joins'=>false, 'order'=>'id ASC']);
		$this->display();
	}
	
	public function edit($id)
	{
		$bgm = new book_group_article_model();
		$this->record = $bgm->getRecord($id);
		$this->group_id = $id;
		$bgr_users = new book_group_article_user_model ();
		$this->users = $bgr_users->getUsers($id);
		
		if(isset($_POST['btn_save_submit'])) {
			
			$userData = $_POST['isApprove'];
			foreach ($userData as $key => $value) {
				$book_group_article_user = $bgr_users->getRecordWhere(['id' => $key]);
				if($book_group_article_user['status'] != $value){
					$status = ['status' =>  $value];
					$bgr_users->editRecord($key, $status);

					if($value == '1' || $value == '2'){
						//##### SEND MAIL #############################################################
						//##### $mTo: Nguoi nhan email chinh
						//#####	$nTo: Ten nguoi nhan email chinh
						//#####	$from: Nguoi duoc CC, thay nhung nguoi khac
						//#####	$title: Ten chu de cua email
						//#####	$content: Noi dung
						//#####
						//#####
						//#############################################################################
						$user_model = new user_model();
						$userOwnerBlog = $user_model->getRecordWithSetting($book_group_article_user['user_id']);
						$cc = "";
						$mainReceiver = $userOwnerBlog['email'];
						$statusMsg = ($value == 1)?"approved":"disapproved";
						$subject="Englight21: Your request to join group ".$this->record['title']." has been ".$statusMsg;
						$mainReceiverText = 'Englight21';
						$href = RootURL."book-groups/".$this->record['slug'];
						$content = "<h3>Check detail at: ".$href."</h3>";
						if($userOwnerBlog['is_disabled_all_email'] == '0')
						vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
						//########## SEND MAIL ########################################################
						
						$notify = new notify_content_model();
						if($userOwnerBlog['is_disabled_all_notification'] == '0'){
							$dataNoti = [
								'user_id' => $userOwnerBlog['id'],
								'description' => "Your request to join group ".$this->record['title']." has been ".$statusMsg,
								'action_id' => 2,
								'link' => "book-groups/".$this->record['slug'],
							  ];
							if($notify->addRecord($dataNoti)){}
						}

					}
				}
				
			}
			// header("Location: ".vendor_app_util::url(["area" => "user","ctl"=>"book_groups", "act"=>"edit/".$id]));
			header("Location: ".RootURL."user/book-groups/edit/".$id);
		}
		
		$book_group = new book_category_model();
		$this->categories = $book_group->all('*',['conditions'=>'', 'joins'=>false, 'order'=>'id ASC']);
		$this->category = $book_group->getCatOfBook($this->record['categories_arr']);
		
		if(isset($_POST['btn_submit'])) {
			$blogData = $_POST['book_group'];
			if(isset($_POST['categories_arr'])){
				$blogData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$blogData['categories_arr'] = ',0,';
			}
			$blogData['categories_id'] = 1;			
			if($_FILES['image']['tmp_name']) {
				if($this->record['featured_image'] && file_exists(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']))
					unlink(RootURI."/media/upload/" .$this->controller.'/'.$this->record['featured_image']);
				$blogData['featured_image'] = $this->uploadImg($_FILES);
			}

			$valid = $bgm->validator($blogData, $id);
			if($valid['status']) {
				if($bgm->editRecord($id, $blogData)) {
					// header("Location: ".vendor_app_util::url(["ctl"=>"book_groups"]));
					header("Location: ".RootURL."user/book-groups");

				} else {
					$this->errors = ['database'=>'An error occurred when editing data!'. $bgm->errors['message']];
					$this->record = $blogData;
				}
			} else {
				$this->errors = $bgm::convertErrorMessage($valid['message']);
				$this->record = $blogData;
				$this->record['id'] = $id;
			}
		}

		if(isset($this->record)) {
			$bm = new book_article_model();
			$rtm = new review_rating_model();
			$this->records = $bm->all('book_articles.*, book_categories.name',['conditions'=>' in_book_group = 1 ', 'joins'=>['book_category']]);

			$status_name = 'owner_status';
			$bgbm = new book_group_article_book_model();
			$this->actionPrevious = $bgbm->getBooks($id, " AND  bb.owner_status = 1 AND  bb.previous_read_status != 0");
			$this->actionCurrent = $bgbm->getBooks($id, " AND bb.owner_status = 1 AND  bb.current_read_status != 0");
        	// echo "Start <br/>"; echo '<pre>'; print_r($this->categories);echo '</pre>';exit("End Data");
		
		}
		if(isset($_POST['book_btn_submit'])) {
			$actm = new book_group_article_book_model();
			$bm = new book_article_model();
			$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
			$dataSearch = $_POST['book'];
			$action = trim($_POST['action'], " ");
			if( $_POST['alt'] === 'edit-search-google') {
				// $bookData = $bm->getRecordWhere([
				// 	'ISBN' => $dataSearch['ISBN'],
				// 	'in_book_group' => '1'
				// ])
				$bookData = [];
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
					
					if(isset($_POST['categories_arr'])){
						$dataSearch['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
					}else{
						$dataSearch['categories_arr'] = ',0,';
					}
					$dataSearch['categories_id'] = 1;

					if(!empty($dataSearch['img_search_api'])) {
						$dataSearch['featured_image'] = $dataSearch['img_search_api'];
					}

					if($_FILES['image']['tmp_name']) {
						$dataSearch['featured_image'] = $this->uploadImg($_FILES);
					}
					// $valid = $bm->validator($dataSearch);
					unset($dataSearch['category_search_api']);
					unset($dataSearch['img_search_api']);
					unset($dataSearch['book_categories_name']);
					$dataSearch['in_book_group'] = 1;
					$dataSearch['id'] = $bm->addRecord($dataSearch);
				} else {
					$dataSearch['id'] = $bookData['id'];
				}
			}

			$dataRecord = [
				'book_group_article_id' => $_POST['book_group_id'],
				'book_id' => $dataSearch['id'],
				$action => 1,
			];
			$checkData = $actm->getRecordWhere([
				'book_group_article_id' => $_POST['book_group_id'],
				'book_id' => $dataSearch['id'],
			]);
			if(empty($checkData)){
				if($action === "previous_read_status") {
					if($actm->checkBookIsCurrent($_POST['book_group_id'], $dataSearch['id'])){
						if($_POST['alt'] === 'edit-search-google'){
							$this->errors = ['message'=>'This data is currently read. Please, select an item to new add!'];
						}
					} else {
						if($actm->addRecord($dataRecord)){


							//##### SEND MAIL #############################################################
							//##### $mTo: Nguoi nhan email chinh
							//#####	$nTo: Ten nguoi nhan email chinh
							//#####	$from: Nguoi duoc CC, thay nhung nguoi khac
							//#####	$title: Ten chu de cua email
							//#####	$content: Noi dung
							//#####
							//#####
							//#############################################################################
							$usersInGroup = $bgr_users->getAllRecords('*', ['conditions' => "book_group_article_id = ".$_POST['book_group_id'].' AND status = 1']);
							$user_model = new user_model();
							$userOwnerBlog = $user_model->getRecordWithSetting($this->record['user_id']);
							$cc = "";
							$mainReceiver = "";
							$user_model = new user_model();
							$notify = new notify_content_model();

							foreach ($usersInGroup as $value) {
								$userInGroup = $user_model->getRecordWithSetting($value['user_id']);
								if($userInGroup['is_disabled_all_email'] == '0'){
									$mainReceiver .= $userInGroup['email'].',';
								}
								if($userInGroup['is_disabled_all_notification'] == '0'){
									$dataNoti = [
										'user_id' => $value['user_id'],
										'description' => "Your group ".$this->record['title']." has a new book: ".$dataSearch['title'],
										'action_id' => 2,
										'link' => "book-groups/".$this->record['slug'],
									  ];
									$notify->addRecord($dataNoti);
								}
							}
							$subject="Englight21: Your group ".$this->record['title']." has a new book: ".$dataSearch['title'];
							$mainReceiverText = 'Englight21';
							$href = RootURL."book-groups/".$this->record['slug'];
							$content = "<h3>Check detail at: ".$href."</h3>";
							if($userOwnerBlog['is_disabled_all_email'] == '0')
							vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
							//########## SEND MAIL ########################################################

							
							if($_POST['alt'] === 'edit-search-google'){
								// header("Location: ".vendor_app_util::url(["ctl"=>"book_groups/edit/".$_POST['book_group_id']]));
								header("Location: ".RootURL."user/book-groups/edit/".$_POST['book_group_id']);
							}
						} else {
							$this->errors = ['message'=>'An error occurred when Edit data!'];
						}
					}
					
				} 
				// previous_read_status
				if($action === "current_read_status") {
					if($actm->checkBookIsPrevious($_POST['book_group_id'], $dataSearch['id'])){
						$this->errors = [
							'message' => 'This data was the previous read. Please, select an item to new add!',
						];
					} else {
						if($actm->addRecord($dataRecord)){


							//##### SEND MAIL #############################################################
							//##### $mTo: Nguoi nhan email chinh
							//#####	$nTo: Ten nguoi nhan email chinh
							//#####	$from: Nguoi duoc CC, thay nhung nguoi khac
							//#####	$title: Ten chu de cua email
							//#####	$content: Noi dung
							//#####
							//#####
							//#############################################################################
							$usersInGroup = $bgr_users->getAllRecords('*', ['conditions' => "book_group_article_id = ".$_POST['book_group_id'].' AND status = 1']);
							$user_model = new user_model();
							$userOwnerBlog = $user_model->getRecordWithSetting($this->record['user_id']);
							$cc = "";
							$mainReceiver = "";
							$user_model = new user_model();
							$notify = new notify_content_model();
							foreach ($usersInGroup as $value) {
								$userInGroup = $user_model->getRecordWithSetting($value['user_id']);
								if($userInGroup['is_disabled_all_email'] == '0'){
									$mainReceiver .= $userInGroup['email'].',';
								}
								if($userInGroup['is_disabled_all_notification'] == '0'){
									$dataNoti = [
										'user_id' => $value['user_id'],
										'description' => "Your group ".$this->record['title']." has a new book: ".$dataSearch['title'],
										'action_id' => 2,
										'link' => "book-groups/".$this->record['slug'],
									  ];
									$notify->addRecord($dataNoti);
								}
							
							}
							$subject="Englight21: Your group ".$this->record['title']." has a new book: ".$dataSearch['title'];
							$mainReceiverText = 'Englight21';
							$href = RootURL."book-groups/".$this->record['slug'];
							$content = "<h3>Check detail at: ".$href."</h3>";
							if($userOwnerBlog['is_disabled_all_email'] == '0')
							vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
							//########## SEND MAIL ########################################################


							if($_POST['alt'] === 'edit-search-google'){
								// header("Location: ".vendor_app_util::url(["ctl"=>"book_groups/edit/".$_POST['book_group_id']]));
								header("Location: ".RootURL."user/book-groups/edit/".$_POST['book_group_id']);
							}
						} else {
							$this->errors = [
								'message' => 'An error occurred when Edit data!'
							];
						}
					}
					
				}
				
			} 
			else {
				$this->errors = [
					'message' => 'This data was available. Please, select an item to new add!'
				];
			}
		}

		$this->display();
	}

	public function add_current_book() {
		global $app;
		$userIdNotRead = [];
		$id = isset($_GET['group_id']) ? $_GET['group_id'] : false;
		$this->bgr_id = $id;
		$bgr_users = new book_group_article_user_model ();
		$this->users = $bgr_users->getUsers($id);
		
		$bgrm = new book_group_article_model();
		$this->categories = $bgrm->getRecord($id,'*', ['conditions'=> 'categories_id = book_categories.id','joins'=>['book_category']]);
		if(isset($_POST['btn_submit'])) {
			$bm = new book_article_model();
			$bgr_bookm = new book_group_article_book_model();
			
			$userData = $_POST['isRead'];
			foreach ($userData as $key => $value) {
				if ($value == 0) {
					array_push($userIdNotRead, $key );
				}
			}
			$bookData = $_POST['book_group'];
			// $bookData = string_helper_model::processForm($bookData);
			$bookData['user_id'] = $_SESSION['user']['id'];
			if(isset($_POST['categories_arr'])){
				$bookData['categories_arr'] = ",".implode(",",$_POST['categories_arr']).",";
			}else{
				$bookData['categories_arr'] = ',0,';
			}
			$bookData['categories_id'] = 1;
			$bookData['owner_group_status'] = 1;
			// $bookData['categories_id']	= $this->categories['categories_id'];
			if($_FILES['image']['tmp_name'])
			$bookData['featured_image'] = $this->uploadImg($_FILES);
			$bookData['year'] = date("Y");
			$bookData['slug'] = vendor_app_util::gen_slug($bookData['title']);
			$valid = $bm->validator($bookData);
			if($valid['status']==1) {
				if($bm->addRecord($bookData)){
					$current_id = $bm->getBookInBookGroupLastInsertId('book_articles');
					$bgrbData = [
						'book_group_article_id' => $id,
						'book_id' => $current_id['id'],
						'current_read_status' => 1,
						'previous_read_status' => 0,
						'user_id_not_read' => join('|' , $userIdNotRead),
					];
					if ($bgr_bookm->addRecord($bgrbData)) {
						header("Location: ".vendor_app_util::url(["area" => "user", "ctl"=>"book_groups"]));
					}
				}
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

	public function changeOwnerStatus()
	{
		$bgm = new book_group_article_model();
		$userbg = new book_group_article_user_model();
		$dataRecord = [
			'owner_status' => $_POST['owner_status']
		];
		$nameGroup = trim($_POST['nameGroup'], ' ');
		$model = '';
		($nameGroup && $nameGroup === "Member") ? $model = $userbg : $model = $bgm;
		if($model->editRecord($_POST['book_group_article'], $dataRecord)){
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
	public function changeOwnerStatusGroupBook()
	{
		$dataRecord = [
			$_POST['action'] => $_POST['status']
		];
		$bgbm = new book_group_article_book_model();

		if($bgbm->editRecord($_POST['id'], $dataRecord)){
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
	public function leaveGroup()
	{
		$book_group_article_id = $_GET['book_group_article_id'];
		$user_group = new book_group_article_user_model();
		$data = $user_group->getRecordWhere([
			'user_id' => $_SESSION['user']['id'],
			'book_group_article_id' => $book_group_article_id
		]);
		if($data) {
			if($user_group->delRecord($data['id'])){
				$data = [
					'status' => 1,
					'message' => 'Leave group successful!'
				];
				http_response_code(200);
				echo json_encode($data);
			} else {
				$data = [
					'status' => 0,
					'error' => 'An error occurred when delete data!'
				];
				http_response_code(200);
				echo json_encode($data);
			}
		}
	}

	public function saveData()
	{
		$actm = new book_group_article_book_model();
		$bm = new book_article_model();
		$userID = isset($_GET['user']) ? $_GET['user'] : $_SESSION['user']['id'];
		$dataSearch = $_POST['book'];
		$action = trim($_POST['action'], " ");
		if( $_POST['alt'] === 'edit-search-google') {
			$bookData = $bm->getRecordWhere([
				'ISBN' => $dataSearch['ISBN'],
				'in_book_group' => '1'
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
				// $valid = $bm->validator($dataSearch);
				unset($dataSearch['category_search_api']);
				unset($dataSearch['img_search_api']);
				unset($dataSearch['book_categories_name']);
				$dataSearch['id'] = $bm->addRecord($dataSearch);
			} else {
				$dataSearch['id'] = $bookData['id'];
			}
		}

		$dataRecord = [
			'book_group_article_id' => $_POST['book_group_id'],
			'book_id' => $dataSearch['id'],
			$action => 1,
		];
		$checkData = $actm->getRecordWhere([
			'book_group_article_id' => $_POST['book_group_id'],
			'book_id' => $dataSearch['id'],
		]);
		if(empty($checkData)){
			if($action === "previous_read_status") {
				if($actm->checkBookIsCurrent($_POST['book_group_id'], $dataSearch['id'])){
					$data = [
						'status' => 0,
						'message' => 'This data is currently read. Please, select an item to new add!...',
					];
					if($_POST['alt'] === 'edit-search-google'){
						echo "Start <br/>"; echo '<pre>'; print_r(vendor_app_util::url(["ctl"=>"book_groups/edit/".$_POST['book_group_id']]));echo '</pre>';exit("End Data");
						header("Location: ".vendor_app_util::url(["ctl"=>"book_groups/edit/".$_POST['book_group_id']]));
					}else {
						http_response_code(200);
						echo json_encode($data);	
					}
				} else {
					if($actm->addRecord($dataRecord)){
						$newRecord = $actm->getRecordWhere([
							'book_group_article_id' => $_POST['book_group_id'],
							'book_id' => $dataSearch['id'],
							$action => 1,
						]);
						$data = [
							'status' => 1,
							'message' => 'Add actions successful!',
							'newRecord' => $newRecord,
						];
						if($_POST['alt'] === 'edit-search-google'){
							header("Location: ".vendor_app_util::url(["ctl"=>"book_groups/edit/".$_POST['book_group_id']]));
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
				
			} 
			// previous_read_status
			if($action === "current_read_status") {
				if($actm->checkBookIsPrevious($_POST['book_group_id'], $dataSearch['id'])){
					$data = [
						'status' => 0,
						'message' => 'This data was the previous read. Please, select an item to new add!',
					];
					http_response_code(200);
					echo json_encode($data);
				} else {
					if($actm->addRecord($dataRecord)){
						$newRecord = $actm->getRecordWhere([
							'book_group_article_id' => $_POST['book_group_id'],
							'book_id' => $dataSearch['id'],
							$action => 1,
						]);
						$data = [
							'status' => 1,
							'message' => 'Add actions successful!',
							'newRecord' => $newRecord,
						];
						if($_POST['alt'] === 'edit-search-google'){
							header("Location: ".vendor_app_util::url(["ctl"=>"book_groups/edit/".$_POST['book_group_id']]));
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
				
			}
			
		} 
		else {
			$data = [
				'status' => 0,
				'message' => 'This data was available. Please, select an item to new add!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

	public function deleteGroup()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_group_article_model();
		$this->handleDeleteMany($ids, $article);
	}

	public function deleteBookGroupBook()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_group_article_book_model();
		$book_article_model = new book_article_model();

		//find books which in bookgroup and delete---------------------------------
		$arrId = explode(',', $ids);
		foreach ($arrId as $key => $value) {
			$record = $article->getRecord($value);
			$book_article_model->delRecord($record['book_id']);
		}
		//------------------------------------------------------------------------

		$this->handleDeleteMany($ids, $article);
	}

	public function deleteBookGroupUser()
	{
		global $app;
		$ids = $app['prs']['id'];
		$article = new book_group_article_user_model();
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

	public function moveReadBook()
	{
		global $app;
		$id = $app['prs']['id'];
		$article = new book_group_article_book_model();
		if($_POST['status'] === 'current_read_status') {
			$dataMove = [
				'current_read_status' => 0,
				'previous_read_status' => 1
			];
		}
		if($_POST['status'] === 'previous_read_status') {
			$dataMove = [
				'current_read_status' => 1,
				'previous_read_status' => 0
			];
		}
		if($article->editRecord($id, $dataMove)) {
			$data = [
				'status' => true,
				'message' => 'Delete successful!'
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'status' => 0,
				'error' => 'An error occurred when editing data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}
}
?>