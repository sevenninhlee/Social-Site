<?php
class static_pages_controller extends vendor_backend_controller
{
	public function index() 
	{
        $im = new static_page_model();
		$this->records = $im->allp('*',['order'=>'created DESC']);
        // echo "Start <br/>"; echo '<pre>'; print_r($this->records);echo '</pre>';exit("End Data");

		$this->display();
    } 
    
	public function add() 
	{
		$this->display();
	} 

	public function edit($id) 
	{
		$im = new static_page_model();
		$this->record = $im->getRecord($id);
		$this->id = $id;
		if(isset($_POST['title']) && isset($_POST['title_slug']) && isset($_POST['content'])) {

			$static_pageData = [
				'title' => $_POST['title'],
				'title_slug' => $_POST['title_slug'],
				'content' => $_POST['content']
			];

			$valid = $im->validator($static_pageData, $id);
			if($valid['status']){
				if($im->editRecord($id, $static_pageData)) {
					$data = [
						'status' => true,
						'data' => 'Edit successfully !'
					];
					http_response_code(200);
					exit(json_encode($data));
				} else {
					$data = [
						'status' => false,
						'data' => 'Edit unsuccessfully  '
					];
					http_response_code(500);
					exit(json_encode($data));
				}
			} else {
				$this->errors = $im::convertErrorMessage($valid['message']);
				$data = [
					'status' => false,
					'data' => $this->errors
				];
				http_response_code(500);
				exit(json_encode($data));
			}
		}
		$this->display();
	} 

	public function static_pages_add_ajax() 
	{
		$im = new static_page_model();
		$static_pageData = [
			'title' => $_POST['title'],
			'title_slug' => $_POST['title_slug'],
			'content' => $_POST['content']
		];

		$valid = $im->validator($static_pageData);
		if($valid['status']){
			if($im->addRecord($static_pageData)){
				$data = [
					'status' => true,
					'data' => 'successfully'
				];
				http_response_code(200);
				echo json_encode($data);
			}
			else {
				$data = [
					'status' => false,
					'data' => 'error'
				];
				http_response_code(500);
				echo json_encode($data);
			}
		} else {
			$this->errors = $im::convertErrorMessage($valid['message']);
			$data = [
				'status' => false,
				'data' => $this->errors
			];
			http_response_code(500);
			echo json_encode($data);
		}
	} 

	public function del($id) {
		$im = new static_page_model();
		if($im->delRecord($id)) {
			header( "Location: ".vendor_app_util::url(array('ctl'=>'static_pages')));
		} else {
			$this->errors = ['message'=>'Can not delete data!'];
		}
	}
}
?>