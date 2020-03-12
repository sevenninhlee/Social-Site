<?php
class review_rating_model extends vendor_frap_model
{

    public $nopp = 10;
    protected $table = 'review_ratings';
	protected $relationships = [
		'belongTo'	=>	[
			['user','key'=>'user_id'],
		]
	];
	
	public function rating($user_id, $object_article_id, $table_model, $value, $review, $review_parent_id, $pathname = '')
	{
		global $app;
		$ratingData = [
			'user_id' => $user_id,
			'object_article_id' => $object_article_id,
			'table_model' => $table_model,
			'review' => $review,
			'value' => $value,
			'review_parent_id' => $review_parent_id,
		];
		if ($review_parent_id == 0) {
			 if($review != "" && $value != 0 ) {
				if($this->addRecord($ratingData)) {
					$notify = new notify_content_model();
	                $postm = new $ratingData['table_model']();
	                $postData = $postm->getRecord($ratingData['object_article_id']);
	                if($postData['user_id'] != $_SESSION['user']['id']) {
	                    $dataNoti = [
	                        'user_id' => $postData['user_id'],
	                        'description' => vendor_html_helper::showUserName($_SESSION['user']). ' has commented on your post' ,
	                        'action_id' => 4,
	                        'link' => $pathname,
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
			} else {
				$data = [
					'succsess' => 0,
					'message' => 'You must complete a review and rating!'
				];
				http_response_code(200);
				echo json_encode($data);
			}
		} else {
			if($review != "" ) {
				if($id = $this->addRecord($ratingData)) {
					$data = [
						'succsess' => 1,
						'data' => [
							'text' => $review,
							'id' => $id,
							'user' => $_SESSION['user']
						],
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
					'message' => 'You must enter reply content!'
				];
				http_response_code(200);
				echo json_encode($data);
			}
		}
		
	}

	public function getAverageRating($object_id, $model){
		global $app;
		$query = " SELECT count(*) as total, SUM(ave_ra.value) as value_sum
					FROM  " . $this->table . " ave_ra  
					WHERE  ave_ra.table_model = '{$model}' 
					AND ave_ra.object_article_id = {$object_id}
					AND ave_ra.review_parent_id = 0 AND ave_ra.owner_status = 1 AND ave_ra.admin_status = 1";

		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		if($rows[0]['total'] != 0) {
			$AverageRating = (float) $rows[0]['value_sum'] / $rows[0]['total'];
		} else $AverageRating = false;
		return number_format($AverageRating,2);
	}

	public function getUserRating($user_id, $object_id, $model){
		
		$query = " SELECT
                	rev_ra.*, us.firstname as user_firstname, us.avata as user_avata
	            FROM
	                " . $this->table . " rev_ra
	                LEFT JOIN
	                    users us
	                        ON rev_ra.user_id = us.id
				WHERE rev_ra.table_model = '{$model}' 
				AND rev_ra.object_article_id = {$object_id} 
				AND rev_ra.review_parent_id = 0
				ORDER BY rev_ra.created ASC";


		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function getUserReviewModel($table, $user_id, $model, $status, $status_name){
		
		$query = " SELECT
                	rev_ra.id as rvID, tb.*
	            FROM
	                " . $this->table . " rev_ra
	                LEFT JOIN
						{$table} tb
	                    ON rev_ra.object_article_id = tb.id
				WHERE rev_ra.table_model = '{$model}' 
				AND rev_ra.review_parent_id = 0
				AND rev_ra.user_id = '{$user_id}'
				AND rev_ra.{$status_name} = {$status}
				ORDER BY rev_ra.created ASC";
		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function getUserReviews($table, $user_id, $model, $status_name){
		
		$query = " SELECT
                	rev_ra.id as rvID, rev_ra.{$status_name} as rvStatus, tb.*
	            FROM
	                " . $this->table . " rev_ra
	                LEFT JOIN
						{$table} tb
	                    ON rev_ra.object_article_id = tb.id
				WHERE rev_ra.table_model = '{$model}' 
				AND rev_ra.review_parent_id = 0
				AND rev_ra.user_id = '{$user_id}'
				ORDER BY rev_ra.created ASC";
		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function getTotalAll($records, $model)
	{	
		foreach ($records['data'] ? $records['data'] : $records  as $key => $record) {
			$records['data'][$key]['getTotalAll'] = $this->count($record['id'], $model);
			$records['data'][$key]['getTotalAll']['avr_reviews'] = $this->getAverageRating($record['id'], $model);
		}

		return $records;
	}

	public function count($obJectID, $model)
	{
		$query = " SELECT
                	*
	            FROM
	                " . $this->table . "
	            WHERE object_article_id = $obJectID AND table_model = '$model' AND review_parent_id = 0 AND owner_status = 1 AND admin_status = 1";
		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}
		$data = [
			'total_likes' => 0,
			'total_reviews' => count($rows)
		];
		$lkm = new like_model();
		foreach ($rows as $review) {
			$data['total_likes'] += $lkm->totalLike($review['id'], __CLASS__);
		}

		return $data;
	}


	public function countAllUsers($obJectID, $model)
	{
		$query = " SELECT
                	*
	            FROM
	                " . $this->table . "
	            WHERE object_article_id = {$obJectID} AND table_model = '{$model}' AND review_parent_id = 0 ";
		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		$data = [
			'total_reviews' => count($rows)
		];

		return $data;
	}

	public function getAllComments($id, $model){
		$conditionsMe = "table_model= '$model' and object_article_id = $id and review_parent_id = 0";
		$comments = $this->getAllRecords('*', ['conditions'=> $conditionsMe,'joins'=>['users'], 'order'=>'id ASC']);
		$arr = [];
		foreach($comments as $item){
			$conditions = 'review_parent_id='.$item['id'];
			$item['num_replies'] = $this->getCountRecords(['conditions'=>$conditions]);
			$um = new user_model();
			$user = $um->getRecord($item['user_id']);
			$item['users_firstname'] = $user['firstname'];
			$item['users_lastname'] = $user['lastname'];
			$item['users_show_name'] = $user['show_name'];
			$item['users_username'] = $user['username'];
			$item['content'] = $item['review'];
			$arr[] = $item;
		}
		return $arr;
	}

	public function getAllCommentsReplies($id){
		$conditionsMe = "review_parent_id =".$id;
		$comments = $this->getAllRecords('*', ['conditions'=> $conditionsMe,'joins'=>['users'], 'order'=>'id ASC']);
		$arr = [];
		foreach($comments as $item){
			$um = new user_model();
			$user = $um->getRecord($item['user_id']);
			$item['users_firstname'] = $user['firstname'];
			$item['users_lastname'] = $user['lastname'];
			$item['users_username'] = $user['show_name'];
			$item['users_show_name'] = $user['username'];
			$item['content'] = $item['review'];
			$arr[] = $item;
		}
		return $arr;
	}

	public function getReviews($model, $user_id, $table, $status_name){
		$query = " SELECT DISTINCT {$table}.* FROM review_ratings
		LEFT JOIN {$table} ON review_ratings.object_article_id = {$table}.id
		WHERE table_model ='{$model}' and review_ratings.$status_name=1 and review_ratings.user_id= '{$user_id}'";
		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

}
?>