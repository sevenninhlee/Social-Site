<?php
class register_controller extends vendor_main_controller {
	protected 	$errors = false;
	public function index() 
	{
		$this->display();
	}

	public function success_rg() 
	{
		$this->display();
	}

	public function createAccount(){
		if(isset($_POST['user'])){
			$data = $_POST;
			$user = $_POST['user'];
			// echo "Start <br/>"; echo '<pre>'; print_r($user);echo '</pre>';exit("End Data");
			$auth = new vendor_auth_model();	
			if (!vendor_app_util::validationEmail($user['email'])){
				$this->errors['input'] = "Wrong email!";
				http_response_code(400);
				echo json_encode($data);
				
			}
			$userData['firstname'] = $user['firstname'];
			$userData['lastname'] = $user['lastname'];
			$userData['username'] = $user['username'];
			$userData['email'] = $user['email'];
			$userData['password'] = $user['password'];
			$userData['phone'] = $user['phone'];
			$userData['gender'] = $user['gender'];
			$userData['status'] = 1;

			if(isset($user['avata'])){
				list($type, $imageData) = explode(';', $user['avata']);
				list(,$extension) = explode('/',$type);
				list(,$imageData)      = explode(',', $imageData);
				$fileName = uniqid().'.'.$extension;
				$ulfd = RootURI.UploadREL .'users/';
				if (!file_exists($ulfd))
				mkdir($ulfd, 0777, true);  //create directory if not exist
				$imageData = base64_decode($imageData);
				file_put_contents($ulfd.$fileName, $imageData);
				$userData['avata'] = $fileName;
			}else
				$userData['avata'] = 'empty.jpg';

			$um = new user_model();
			$valid = $um->validator($userData);
			if($valid['status']) {

				$captcha = false;
				if(isset($_POST['g-recaptcha-response'])){
				   $captcha = $_POST['g-recaptcha-response'];
				}
				if(!$captcha){
					$valid = [
						'status' => false,
						'errors' => ['captcha' => 'Please click captcha to submit']
					];
					http_response_code(400);
					echo json_encode($valid);
				}else{
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeCccUUAAAAALe3-fQt1xl7MXVEd3MQsnu7UlzD&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
					$response = json_decode($response, TRUE);
					if($response['success'] == false){
						$valid = [
							'status' => false,
							'errors' => ['captcha' => 'Robot']
						];
						http_response_code(400);
						echo json_encode($valid);
					}else{
						$userData['password'] = vendor_app_util::generatePassword($userData['password']);
						$userData['role'] = 2;
						$userData['status'] = 0;
						if($um->addRecord($userData)){
							$email = $userData['email'];
							$fgpm = new forgotpass_model();
							if( $fgpm->checkOldEmail($email)) {	
								$tokenRemember = time().rand(10000,99999);
								$fgpm -> addRememberToken($tokenRemember,$email);

								$mTo = $email;
								$title = 'CONFIRM REGISTER';
								$href = RootABS.
								  		vendor_app_util::url([
								  				'ctl'=>'register',
								  				'act'=> 'activeAccount', 
								  				'params'=> ['remember_active_token' => $tokenRemember]
								  		]);
								$content = "
									<h3>What's Next?</h3>
								  	<p>Please <a target='_blank' href='".$href."'>Click On This link </a> to activate  your account.</p>
								";
								$nTo = 'Enlight21';
								
								if (vendor_app_util::sendMail($title, $content, $nTo, $mTo)) {
									$valid = [
										'status' => true,
										'message'=>'Sign up successfully. Please check your email to activate  your account.'
									];
									http_response_code(200);
									echo json_encode($valid);
								} else {
									$this->errors = ['database'=>'An error occurred when send request data! '];
									$data = [
										'status' => 0,
										'data' => $this->errors
									];
									http_response_code(501);
									echo json_encode($data);
								}
							}
						}else{
							$this->errors = ['database'=>'An error occurred when inserting data!'];
							$valid = [
								'status' => false,
								'errors' => $this->errors
							];
							http_response_code(400);
							echo json_encode($valid);
						}
					}
				}
				 
			}else{
				$valid['message'] = $um::convertErrorMessage($valid['message']);
				$valid = [
					'status' => false,
					'errors' => $valid['message']
				];
				http_response_code(400);
				echo json_encode($valid);
			}
		}
	}

	public function activeAccount()
	{
		global $app;
		$tokenActive = $app['prs']['remember_active_token'];
		$um = new user_model();
		$result = $um->getRecordWhere([
			'remember_active_token' => $tokenActive,
		]);
		if($result) {
			$data['status'] = 1;
			$um->editRecord($result['id'], $data);
		}else {
			$this->errors['message'] = "The token does not exist. Please try again!";
		}

		header( "Location: ".vendor_app_util::url(['ctl'=>'login']));
	}
}
?>