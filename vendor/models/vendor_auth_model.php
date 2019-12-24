<?php
class vendor_auth_model extends vendor_main_model {
	public function login($user=null, $admin=false, $remember=null) {
		global $app;
		$result = null;
		$um = new user_model();
		if($user){
			$email = $user['email'];
			$password = vendor_app_util::generatePassword($user['password']);
			$result = $um->getRecordWhere([
				'email' => $email,
				'password' => $password
			]);
		}
		if($remember){
			$remember_me_identify = $remember['remember_me_identify'];
			$remember_me_token = $remember['remember_me_token'];
			$result = $um->getRecordWhere([
				'remember_me_identify' => $remember_me_identify,
				'remember_me_token' => $remember_me_token
			]);
		}
		if ($result) {
			$row = $result;
			$_SESSION['user'] = $row;
			if (isset($_POST['remember'])){
				$time = time()+60*60*24*100;
				$identify = vendor_app_util::hashStr();
				$code = crypt($_POST['user']['password'], $identify);
				if ($um->editRecord($row['id'],[
					'remember_me_identify' => $identify, 
					'remember_me_token'    => $code
				]))
				setcookie("remember_user",$user['email'] , $time, '/');
				setcookie("remember",$identify.':'.$code , $time, '/');		
				setcookie("remember_password",$user['password'] , $time, '/');
				setcookie("remember_role",$app['area'] , $time, '/');
			} else {
				$time = 3600;
    			unset($_COOKIE['remember_user']);
				setcookie('remember_user', '', time() - $time, '/');
				unset($_COOKIE['remember_password']);
				setcookie('remember_password', '', time() - $time, '/');
				unset($_COOKIE['remember_role']);
				setcookie('remember_role', '', time() - $time, '/');
			}
			if($admin) {
				$rolesFlip = array_flip($app['roles']);
				if ($row['role']!=$rolesFlip["admin"]) return 0;
			}

			return 1;
		}
		return 0;
		
	}
}
?>