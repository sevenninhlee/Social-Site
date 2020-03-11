<?php 
class book_groups_controller extends right_bar_data_controller {
    public function index(){

        $bgm = new book_group_article_model();
        $wheres = ["admin_status" => 1, "owner_status" => 1];
        // if(isset($_GET['cat'])) {
        //     $bcm = new book_category_model();
        //     $categoryData = $bcm->getRecordWhere(['slug' => $_GET['cat']]);
        //     if($categoryData) $category_id = $categoryData['id'];
        //     $wheres = array_merge($wheres, ['categories_id' => $category_id]);
        // }
        $this->records = $bgm->read_paging($bgm, 'created', $wheres);
        
        $userbg = new book_group_article_user_model();
        $bcm = new book_category_model();
        if(!empty($this->records['data'])){
            foreach($this->records['data'] as $key => $record){
                $this->records['data'][$key]['userNum'] = $userbg->getCountRecords(['conditions'=>'book_group_article_id='.$record['id']]) + 1;
                if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])){
                    $this->records['data'][$key]['isDisapprove'] = $userbg->checkUserIsDisapprove($record['id']);
                    $this->records['data'][$key]['ListCate'] = $bcm->getCatOfBook($record['categories_arr']);
                    
                }
            }
        }

        // echo "Start <br/>"; echo '<pre>'; print_r($this->currentBooks);echo '</pre>';exit("End Data");


        $conditions = 'admin_status = 1 AND owner_status = 1';
        $this->newBookGroups = $bgm->all('book_group_articles.*',['conditions'=>$conditions, 'joins'=>['book_category'], 'order'=> ' created DESC LIMIT 0,5']);
        $this->display();
    }

    public function review($pr=null)
    {
        global $app;
        $userID = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
        $slug['slug'] = $pr['1'];
        $bm = new book_group_article_model();
		$obj_bm = $bm->getRecordWhere($slug);
        $id[1] = $obj_bm['id'];
        
        $bgm = new book_group_article_model();
        $this->record = $bgm->getJoinRecords($id[1]);
        
        $bgum = new book_group_article_user_model();
        if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])){    
            $this->checkUser = $bgum->checkUserInGroup($id[1]);
        } else {
            $this->checkUser = false;
        }
        if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])){    
            $this->checkUserIsApprove = $bgum->checkUserIsApprove($id[1]);
        } else {
            $this->checkUserIsApprove = false;
        }
        
        $bgbm = new book_group_article_book_model();
        $this->currentBooks = $bgbm->getBooks($id[1], " AND current_read_status = 1");

		
        $this->previousBooks = $bgbm->getBooks($id[1], " AND previous_read_status = 1");
        
        $this->display();
    }

    public function joinGroup(){
        $user_id = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
        $ob_id = isset($_POST['book_group_article_id']) ? $_POST['book_group_article_id'] : null;
        $joinData = [
            'user_id' => $user_id,
            'book_group_article_id' => $ob_id
        ];
        $bgr_user = new book_group_article_user_model();
        $addUser = $bgr_user->addRecord($joinData);
        if ($addUser) {

            $bgm = new book_group_article_model();
            $this->record = $bgm->getRecord($ob_id);
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
            $userOwnerBlog = $user_model->getRecordWithSetting($this->record['user_id']);
            $cc = "";
            $mainReceiver = $userOwnerBlog['email'];
            $subject="Englight21: Your group ".$this->record['title']." have a new request to join by ".$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'];
            $mainReceiverText = 'Englight21';
            $href = RootURL."user/book-groups/edit/".$ob_id;
            $content = "<h3>Check detail at: ".$href."</h3>";
            if($userOwnerBlog['is_disabled_all_email'] == '0')
            vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
            //########## SEND MAIL ########################################################

			if($userOwnerBlog['is_disabled_all_notification'] == '0'){
                $notify = new notify_content_model();
                $dataNoti = [
                  'user_id' => $userOwnerBlog['id'],
                  'description' => "Your group ".$this->record['title']." have a new request to join by ".$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'],
                  'action_id' => 2,
                  'link' => "user/book-groups/edit/".$ob_id,
                ];
                $notify->addRecord($dataNoti);
            }

            $data = [
                'succsess' => 1,
            ];

            http_response_code(200);
            echo json_encode($data);
        } else {
            $data = [
                'succsess' => 0,
                'message' => 'An error occurred when inserting data!'
            ];
            http_response_code(200);
            echo json_encode($data);
        }

    }
    
    public function book_review($id){
		global $app;
		$conditions = "owner_status = 1 AND admin_status = 1";
        $rpCondition = "owner_status = 1 AND admin_status = 1";
		$userID = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
        
		$bm = new book_group_article_book_model();
		$this->record = $bm->getRecord($id,'*',['conditions'=>'','joins'=>['book_article','book_group_article']]);
        $this->bgr_id =  $this->record['book_id'];
                
        $bgum = new book_group_article_user_model();
        if($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])){    
            $this->checkUser = $bgum->checkUserInGroup($this->record['book_group_article_id']);
        } else {
            $this->checkUser = false;
        }

		$book = new book_category_model(); 
        $this->category = $book->getCatOfBook($this->record['book_articles_categories_arr']);
		
        $reviews = new review_rating_model();
        
		$rpCondition .= " AND table_model = 'book_article_model' AND object_article_id = {$this->bgr_id} AND review_parent_id != 0";
		$this->reply = $reviews->getAllRecords('users.*, review_ratings.*', ['conditions'=>$rpCondition, 'joins'=>['user'], 'order'=>'created ASC']);
        
        // echo "Start <br/>"; echo '<pre>'; print_r($this->reply);echo '</pre>';exit("End Data");

        $conditionsCmt = "table_model = 'book_article_model' AND object_article_id = {$this->bgr_id} AND review_parent_id = 0 AND value = 0 AND owner_status = 1 AND admin_status = 1";
        $this->comments = $reviews->allp('*',['conditions'=>$conditionsCmt, 'joins'=>['user'], 'order'=>'updated DESC']);

		$this->display();
	}
}

?>