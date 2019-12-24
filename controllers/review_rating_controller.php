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
                $notify = new notify_content_model();
                $postm = new $data['table_model']();
                $postData = $postm->getRecord($data['object_article_id']);
                if($data['table_model'] != "book_group_article_book_model" && $postData['user_id'] != $_SESSION['user']['id']) {
                    $dataNoti = [
                        'user_id' => $postData['user_id'],
                        'description' => ucwords($_SESSION['user']['firstname']).' '.ucwords($_SESSION['user']['lastname']). ' has commented on your post' ,
                        'action_id' => 4,
                        'link' => $_POST['pathname'],
                    ];
                    $notify->addRecord($dataNoti);
                }

                $commentData = $rm->getRecord($id);
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
    
}

?>
