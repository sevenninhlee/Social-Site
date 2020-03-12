<?php
class review_rating_controller extends vendor_main_controller
{
	public function getRating()
	{
		$rm = new review_rating_model();
        $user_id = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
        $review_parent_id = isset($_POST['review_parent_id']) ? $_POST['review_parent_id'] : 0 ;
		$object_article_id = $_POST['object_article_id'];
        $table_model = $_POST['table_model'];
		$value = $_POST['value'];
        $review = $_POST['review'];

        if($review_parent_id == 0){
            $this->usersRating = $rm->getUserRating($user_id, $object_article_id, $table_model);
            foreach ($this->usersRating as $user) { 
                if ((int) $user['user_id'] == (int) $user_id ) {
                        $data = [
                            'succsess' => 0,
                            'message' => 'You have rated and review!'
                        ];
                        http_response_code(200);
                        echo json_encode($data); exit();
                    }
                }
           
        }
        $pathname = isset($_POST['pathname']) ? $_POST['pathname'] : '';
        $rm->rating($user_id, $object_article_id, $table_model, $value,  $review, $review_parent_id, $pathname);
        
    }

    public function addComment()
	{
        $rm = new review_rating_model();
        $data['user_id'] = ($_SESSION && isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : null;
        $data['review_parent_id'] = 0;
        $data['object_article_id'] = $_POST['object_article_id'];
        $data['table_model'] = $_POST['table_model'];
        $data['value'] = 0;
        $data['review'] = $_POST['review'];

        if ($data['table_model'] == "queries_article_model") {
            $this->usersRating = $rm->getUserRating($data['user_id'], $data['object_article_id'], $data['table_model']);
            // echo "Start <br/>"; echo '<pre>'; print_r($this->usersRating);echo '</pre>';exit("End Data");
            foreach ($this->usersRating as $user) { 
                if ((int) $user['user_id'] == (int) $data['user_id'] ) {
                        $data = [
                            'status' => 0,
                            'message' => 'You have answered !'
                        ];
                        http_response_code(200);
                        echo json_encode($data); exit();
                    }
                }
        }
           

        if ($_POST['review'] != "") {
            if( $id = $rm->addRecord($data)){
                $data['groupBookId'] = $_POST['groupBookId'];
                $notify = new notify_content_model();
                $postm = new $data['table_model']();
                $postData = $postm->getRecord($data['object_article_id']);
                if($data['table_model'] != "book_group_article_book_model" && $postData['user_id'] != $_SESSION['user']['id']) {
                    $dataNoti = [
                        'user_id' => $postData['user_id'],
                        'description' => vendor_html_helper::showUserName($_SESSION['user']). ' has commented on your post' ,
                        'action_id' => 4,
                        'link' => $_POST['pathname'],
                    ];
                    $notify->addRecord($dataNoti);
                }

                $commentData = $rm->getRecord($id);
                if($data['table_model'] == 'blog_article_model'){
                    //##### SEND MAIL #############################################################
                    //##### $mTo: Nguoi nhan email chinh
                    //#####	$nTo: Ten nguoi nhan email chinh
                    //#####	$from: Nguoi duoc CC, thay nhung nguoi khac
                    //#####	$title: Ten chu de cua email
                    //#####	$content: Noi dung
                    //#####
                    //#####
                    //#############################################################################
                    $article =  new $data['table_model']();
                    $blog = $article->getRecord($data['object_article_id']);
                    $user_model = new user_model();
                    $userOwnerBlog = $user_model->getRecordWithSetting($blog['user_id']);
                    $cc = "";
                    $mainReceiver = $userOwnerBlog['email'];
                    $subject="Englight21: Your post has a new comment - ". $blog['title'];
                    $mainReceiverText = 'Englight21';
                    $href = RootURL."blogs/".$blog['slug'];
                    $content = "<h3>Your post has just a new comment, check detail at: ".$href."</h3>";
                    if($userOwnerBlog['is_disabled_all_email'] == '0' && $userOwnerBlog['is_email_get_new_comment'] == '1')
                    vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
                    //########## SEND MAIL ########################################################
                }else if($data['table_model'] == 'book_article_model'){
                    
                    //##### SEND MAIL #############################################################
                    //##### $mTo: Nguoi nhan email chinh
                    //#####	$nTo: Ten nguoi nhan email chinh
                    //#####	$from: Nguoi duoc CC, thay nhung nguoi khac
                    //#####	$title: Ten chu de cua email
                    //#####	$content: Noi dung
                    //#####
                    //#####
                    //#############################################################################
                    $article =  new $data['table_model']();

                    $blog = $article->getRecord($data['object_article_id']);
                    $book_group_article_books_model = new book_group_article_book_model();
                    $bookGroupId = $book_group_article_books_model->getRecord($data['groupBookId'])['book_group_article_id'];
                    $user_model = new user_model();

                    $listUserJoined = $user_model->getListUserJoinedBookGroup($bookGroupId);
                    $mainReceiver = "";

                    foreach ($listUserJoined['data'] as $key => $value) {
                        if($value['is_disabled_all_email'] == '0' && $value['is_email_get_new_comment'] == '1'){
                            $mainReceiver .= $value['email'].',';
                        }
                        // if($key != 0 ) $mainReceiver .= ','.$value['email'];
                        // else $mainReceiver .= $value['email'];
                    }
                    $cc = "";
                    $subject="Englight21: A book in a group you're disscussing has a new comment - ". $blog['title'];
                    $mainReceiverText = 'Englight21';
                    $href = RootURL."book-groups/book-review/".$data['groupBookId'];
                    $content = "<h3>A book in a group you're disscussing has just a new comment, check detail at: ".$href."</h3>";
                    vendor_app_util::sendMail($subject, $content, $mainReceiverText, $mainReceiver,$cc);
                    //########## SEND MAIL ########################################################
                }
               

                $data = [
                    'status' => 1,
                    'data' => $commentData
                ];

                http_response_code(200);
                echo json_encode($data);
            }else {
                $data = [
                    'status' => 0,
                    'message' => 'An error occurred when inserting data! '
                ];
                http_response_code(200);
                echo json_encode($data);
            }
        } else {
            $data = [
                'status' => 0,
                'message' => 'You must enter comment content!'
            ];
            http_response_code(200);
            echo json_encode($data);
        }
    }

    public function editRating()
    {
        $id = $_POST['revID'];
        if($_POST['value'] != 0){
            $data['value'] = $_POST['value'];
        }
        $data['review'] = $_POST['review'];
        
        $rm = new review_rating_model();
        if($_POST['review'] != "" ) {
            if($rm->editRecord($id, $data)) {
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
        } else {
            $data = [
                'succsess' => 0,
                'message' => 'You must complete a review and rating!'
            ];
            http_response_code(200);
            echo json_encode($data);
        }

    }

    public function editComment()
    {
        $id = $_POST['id'];
        $data['review'] = $_POST['review'];
        $rm = new review_rating_model();

        if($_POST['review'] != "" ) {
            if($rm->editRecord($id, $data)) {
                $data = [
                    'status' => 1
                ];
                http_response_code(200);
                echo json_encode($data);
            } else {
                $data = [
                    'status' => 0,
                    'message' => 'An error occurred when editting data!'
                ];
                http_response_code(200);
                echo json_encode($data);
            }
        } 
    }
    public function deleteComment()
    {
        $id = $_POST['id'];
        $rm = new review_rating_model();

        if($_POST['id'] != "" ) {
            if($rm->delRecord($id)) {
                $data = [
                    'status' => 1
                ];
                http_response_code(200);
                echo json_encode($data);
            } else {
                $data = [
                    'status' => 0,
                    'message' => 'An error occurred when deleting data!'
                ];
                http_response_code(200);
                echo json_encode($data);
            }
        } 
    }
}

?>
