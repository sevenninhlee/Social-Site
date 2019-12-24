<?php
function __autoload($classname) {
	global $app;
	$arrCL 		= explode("_",$classname);
	$firstCL 	= current($arrCL);
	$lastCL		= end($arrCL);
	$filename = "";
	$areaPath = $app['areaPath'];
	if($firstCL == "vendor") {
		$filename = "vendor/";
		$areaPath = "";
	} else if($lastCL=='helper') {
		// Use helper in views folder outside vendor
		$filename = 'views/';
	}

	$filename .= $lastCL."s/".$classname .".php";
	$areaFilename =  $lastCL."s/".$areaPath. $classname .".php";
	if($areaPath && is_file( $areaFilename)) {
		include_once($areaFilename);
	} else if (is_file($filename)) {
    	include_once($filename);
	} else {
		if (is_file($areaFilename)) {
	    	include_once($areaFilename);
		} else {
			include_once("controllers/staticpages_controller.php");
		}
	}
}
?>