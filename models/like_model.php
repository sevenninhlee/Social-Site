<?php
class like_model extends vendor_frap_model
{
	public $nopp = 10;
	protected $relationships = [
		
	];

	public function like($userID, $obJectID, $model)
	{
		$dataLike = [
			'user_id' => $userID,
			'object_article_id' => $obJectID,
			'table_model' => $model
		];

		if($this->addRecord($dataLike)) {

			$data = [
				'succsess' => 1,
				'message' => 'addLike',
				'total_like' => $this->totalLike($obJectID, $model)
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

	public function unLike($userID, $obJectID, $model)
	{
		$query = "SELECT * FROM likes WHERE object_article_id = {$obJectID} AND table_model = '{$model}' AND user_id = {$userID}";
		$result = $this->con->query($query);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;

		if($record && $this->delRelativeRecord($record['id'])){
			$data = [
				'succsess' => 1,
				'message' => 'disLike',
				'total_like' => $this->totalLike($obJectID, $model)
			];
			http_response_code(200);
			echo json_encode($data);
		} else {
			$data = [
				'succsess' => 0,
				'message' => 'An error occurred when delete data!'
			];
			http_response_code(200);
			echo json_encode($data);
		}
	}

	public function checkUserLike($userID, $obJectID, $model)
	{
		$query = "SELECT user_id FROM likes WHERE object_article_id = {$obJectID} AND table_model = '{$model}' AND user_id = {$userID}";
		$result = $this->con->query($query);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;

		if($record && !empty($record)) return true; 
		else return false;
	}

	public function totalLike($obJectID, $model)
	{	
		$conditionsTmp = "object_article_id = {$obJectID} AND table_model = '{$model}'";
		$totalLike = $this->getCountRecords(['conditions'=>$conditionsTmp]);
		return $totalLike;
	}

	public function getCountLiket($article_id){
		$query = "SELECT COUNT(*) as total_rows FROM likes WHERE object_article_id={$article_id}";
		print_r($query);
		exit();
	    $result = $this->con->query($query);
		if($result) {	
			$record = $result->fetch_assoc();
		} else $record=false;
	    return $record['total_rows'];
	}
}
?>