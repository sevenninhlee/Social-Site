<?php
class login_controller extends vendor_main_controller {
	protected 	$errors = false;	
	public function index() {
		global $app;
		$rolesFlip = array_flip($app['roles']);
		if (isset($_COOKIE['remember'])) {
			$auth = new vendor_auth_model();
			$arr = explode(":", $_COOKIE["remember"]);
			$remember = ['remember_me_identify'	=> $arr[0],
					 'remember_me_token'	=> $arr[1]];
			if ($auth->login(null, true, $remember)) {
				header( "Location: ".vendor_app_util::url(['ctl'=>'home']));
			} else {
			}
		}

		if (isset($_SESSION['user']['role'])) {
			header( "Location: ".vendor_app_util::url(['ctl'=>'home']));
		}
		if(isset($_POST['btn_submit'])) {
			$user = $_POST['user'];
			$um = new user_model();
			$result = null;
			if($user){
				$result = $um->getRecordWhere([
					'email' => $user['email'],
					'status' => 1
				]);
			} 
			$auth = new vendor_auth_model();
			if (!vendor_app_util::validationEmail($user['email'])){
				$this->errors['message'] = "Wrong email!";
			}else if($result){
				if($auth->login($user)) {
					if ($_SESSION['link'] == "") header("Location: ".vendor_app_util::url(['ctl'=>'home']));
					else header("Location: ".vendor_app_util::url(['ctl'=>$_SESSION['link']]));
					
				} else {
					$this->errors = ['message'=>'The password does not exist. Please try again!'];
				}
			} else {
				$this->errors = ['message'=>'You can not login to your new account until you have confirmed your activation'];
			}
			
		}
		$this->display();
	}
	
	public function logout() {
		session_unset(); 
		session_destroy(); 
		$time = 3600;
    	unset($_COOKIE['remember']);
		setcookie('remember', '', time() - $time, '/');
		header( "Location: ".vendor_app_util::url(array('ctl'=>'login')));
	}

	public function forgotPassWord() {
		global $app;
		if(isset($_POST['btn_submit']))
		{
			$email = $_POST['email'];
			$checkemail = new forgotpass_model();
			if( $checkemail->checkOldEmail($email)) {	
				$tocken = time().rand(10000,99999);
				$checkemail -> addtocken($tocken,$email);

				$mTo = $email;
				$title = 'HTML email';
				$href = RootABS.
				  		vendor_app_util::url([
				  				'ctl'=>'login',
				  				'act'=> 'resetPassWord', 
				  				'params'=> ['tocken' => $tocken]
				  		]);
				$content = "
					<h3>What's Next?</h3>
				  	<p>Please <a target='_blank' href='".$href."'>click here </a> to create your new password.</p>
				";
				$nTo = 'Village ties';
				
				vendor_app_util::sendMail($title, $content, $nTo, $mTo);
				$this->errors = ['message'=>'<a href="#">thank! Please check your email to change password.</a>'];
				
			} else {
				$this->errors = ['message'=>'Error! Please enter a valid email address.'];
			}
		}
		$this->display();
	}

	public function resetPassWord() {
		global $app;
		$this->tocken = $app['prs']['tocken'];
		$checktocken = new forgotpass_model();
		if( $checktocken->resetPassWord($this->tocken)) {
			if(isset($_POST['btn_submit']))
			{
				if ($_POST['password'] == $_POST['confirmpassword']) {
				$tocken = $this->tocken;
				$password = vendor_app_util::generatePassword($_POST['password']);
				if ($checktocken->updatePassword($tocken,$password)){
					header( "Location: ".vendor_app_util::url(array('ctl'=>'login')));
				} else {
					$this->display();
				}
			}else{
				$this->errors = ['message'=>'Error confirm password!'];
				$this->display();
			}
			}
			$this->display();
		} else {
			$this->errors = ['message'=>'Error! Token does not exist, Please check the token '];
			$this->display(['act'=>'erorsResetPass']);
		}
	}
}
?>
