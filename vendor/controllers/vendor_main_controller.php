<?php
class vendor_main_controller {
    private 	$data;
	protected 	$layout = "";
	protected 	$model; 
	protected 	$controller = "home";
	protected 	$action = "index";
	public	 	$components;
	protected 	$allowedExts = ["gif", "jpeg", "jpg", "png"];
	
	public function  __construct() {
		global $app;
		$this->controller = $app['ctl'];
		if(isset($app['act'])) $this->action = $app['act'];
		else $app['act'] = $this->action;
		if(method_exists($this, $this->action)) {
			if(isset($app['prs']) && count($app['prs'])) {
				$this->{$this->action}($app['prs']);
			} else $this->{$this->action}();
		} else {
			include "views/".$app['areaPath']."staticpages/error.php";
		}
	}
	
	public function display($options=null) {
		global $app;
		if(!isset($options['area']))	$options['area'] = $app['areaPath'];
		if(!isset($options['ctl']))		$options['ctl'] = $this->controller;
		if(!isset($options['act']))		$options['act'] = $this->action;
		$view = "views/".$options['area'].$options['ctl']."/".$options['act'].".php";
		if (is_file($view)) 
			include_once $view;
		else {
			$this->viewfile = $view;
			include_once "views/".$options['area']."staticpages/missingview.php";
		}
	}

	public function uploadImg($flies, $newSize=null) {
		$arrt	=	explode("/", $flies["image"]["type"]);
		
		$name_arr = explode('.', $flies["image"]["name"]);
		$file_name = join(".", array_slice($name_arr ,0, -1)); 
		
		$type	=	end($arrt);
		if (($flies["image"]["size"] < 200000000)
			&& in_array($type, $this->allowedExts)) {
			if ($flies["image"]["error"] > 0) {
				return false;
		    }
			$ulfd = RootURI.UploadREL .$this->controller.'/';
			$newfn = $file_name.'_'.time().rand(10000,99999).'.'.$type;
		    if (!file_exists($ulfd . $newfn)) {
				// mkdir($ulfd, 0777, true);  //create directory if not exist
				// chmod($ulfd, 0777);
		        move_uploaded_file($flies["image"]["tmp_name"], $ulfd.$newfn);
				$simpleImg = new vendor_simpleImage_component($ulfd.$newfn);
				if(isset($newSize['height']) && !isset($newSize['width'])) {
					$simpleImg->resizeToHeight($newSize['height']);
				} else {
					$newW = 1400;
					if(isset($newSize['width'])) {
						$newW = $newSize['width'];
					}
					$simpleImg->resizeToWidth($newW);
				}
				$simpleImg->saveResize($ulfd.$newfn);
		    }
			return $newfn;
		} else {
			return false;
		}
	}
	
    public function setProperty($name, $value) {
        $this->$name = $value;
    }
    
    public function checkAuth () {
		global $app;
		if (isset($_COOKIE['remember_me'])) {
			$auth = new vendor_auth_model();
			$arr = explode(":", $_COOKIE["remember_me"]);
			$remember = ['remember_me_identify'	=> $arr[0],
					 'remember_me_token'	=> $arr[1]];
			if ($auth->login(null, true, $remember)) {
			} else {

			}
		}
		$_SESSION['link'] = $_GET['pr'];
		if (!isset($_SESSION['user']['email'])) {
			// header( "Location: ".vendor_app_util::url(array('ctl'=>'login')));
			header( "Location: ".RootURL."login");
			exit;
		}
    }
    
    public function checkPermissionRole($role) {
    	$this->checkAuth();
		global $app;
		$rolesFlip = array_flip($app['roles']);
		if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == $rolesFlip[$role])
		 	return true;
		return false;
    }
}
?>