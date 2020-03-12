<?php
class vendor_html_helper{
	const helpersDirectory = "/helpers/";

	public static function link($text, $options=null) {
		return '<a href="'.vendor_app_util::url($options).'">'.$text.'</a>';
	}

	public static function pagination($norecords, $nocurp, $curp, $nopp) {
		$from 	= ($curp-1)*$nopp+1;
		$to 	= ($curp-1)*$nopp + $nocurp;
		$nopages= ceil($norecords/$nopp);
		$relpath = self::helpersDirectory.__FUNCTION__."/index.php";
		if(is_file("views".$relpath)) include "views".$relpath;
		else include "vendor".$relpath;
	}

	public static function contentheader($title, $breadcrumb) {
		$relpath = self::helpersDirectory.__FUNCTION__."/index.php";
		if(is_file("views".$relpath)) include "views".$relpath;
		else include "vendor".$relpath;
	}

	public static function flasherrors() {
		$relpath = self::helpersDirectory.__FUNCTION__."/index.php";
		if(is_file("views".$relpath)) include "views".$relpath;
		else include "vendor".$relpath;
		unset($_SESSION['flasherror']);
	}

	public static function processSQLString( $query = ''){
		$patterns = array();
		// $patterns[0] = '/\"/';
		$patterns[1] = '/\'/';
		$patterns[2] = '/!/';
		$patterns[3] = '/\$/';
		$patterns[4] = '/%/';
		// $patterns[5] = '/(/';
		// $patterns[6] = '/)/';
		$patterns[5] = '/-/';
		// $patterns[6] = '/;/';
		// $patterns[7] = '/=/';
		// $patterns[8] = '/@/';
		// $patterns[9] = '/>/';
		// $patterns[10] = '/</';
		$replacements = array();
		// $replacements[0] = '&quot;';
		$replacements[1] = '&#39;';
		$replacements[2] = '&#33;';
		$replacements[3] = '&#36;';
		$replacements[4] = '&#37;';
		// $replacements[5] = '&#40;';
		// $replacements[6] = '&#41;';
		// $replacements[5] = '&#45;'; // - not replace because date has it
		$replacements[5] = '-'; // - not replace because date has it
		// $replacements[6] = '&#59;';
		// $replacements[7] = '&#61;';
		// $replacements[8] = '&#64;';
		// $replacements[9] = '&#62;';
		// $replacements[10] = '&#60;';
		$query = preg_replace($patterns, $replacements, $query);
		return $query;
	}

	//    vendor_html_helper::showUserName($user);
	public static function showUserName($user=[], $isJoin = false){
		if($isJoin){
			if($user['users_show_name'] == 0){
				return $user['users_firstname'].' '.$user['users_lastname'];
			}else{
				return $user['users_username'];
			}
		}else{
			if($user['show_name'] == 0){
				return $user['firstname'].' '.$user['lastname'];
			}else{
				return $user['username'];
			}
		}
		
	}
}
?>