<?php
session_start();
$app['ctl'] = "home";
$prs = [];

if(isset($_GET["pr"])) {
	$prs = explode("/",$_GET["pr"]);
	if ($prs[0] && strlen($prs[0]) > 0 && count(explode("-", $prs[0])) > 1 ) {
		$prs[0] = str_replace("-", "_", $prs[0]);
	}
	if ($prs[1] && strlen($prs[1]) > 0 && count(explode("-", $prs[1])) > 1 ) {
		$prs[1] = str_replace("-", "_", $prs[1]);
	}
	if ($prs[0] == "privacy_policy" || $prs[0] == "terms_of_use" || $prs[0] == "about" ) {
		$prs[2] = str_replace("_", "-", $prs[0]);
		$prs[0] = "page";
		$prs[1] = "index";
	}

	// $par = $_GET["pr"];
	// if(preg_match('/\/$/', $par) && !preg_match('/\/\/$/', $_SERVER['REQUEST_URI'])){
	// 	$par = substr($par, 0, -1);
	// }

	// if(preg_match('/\/\/$/', $_SERVER['REQUEST_URI'])){
	// 	$app['linkpage'] = "null";
	// 	$prs = explode("/","404/index");
	// }
	// else{

	// 	$link_url = $_SERVER['REQUEST_URI'];
	// 	if(preg_match('/viec-lam\/(.*)-(\d+).html/', $link_url, $matches)){
	// 		$prs = explode("/","jobs/view/".$matches[1].'/'.$matches[2]);
	// 		$app['linkpage'] = "tuyen-dung-viec-lam-chi-tiet";
	// 		break;
	// 	}

	// 	echo "Start <br/>"; echo '<pre>'; print_r($par);echo '</pre>';exit("End Data");

	// }



	
} else {
	$uriSplit = explode("/", $_SERVER['PHP_SELF']);
	$requestUriConfig = $_SERVER["REQUEST_URI"];	
	if ($uriSplit[1] != "index.php") {
		$requestUriConfig = substr($_SERVER["REQUEST_URI"], strlen($uriSplit[1]) + 1);
	}
	
	if($_SERVER['PHP_SELF']!="/index.php") {		
		$prs = explode("/",substr($requestUriConfig, 1));	
	}
}

$noPrs = count($prs);
if($noPrs) {
	// Check if admin area
	if($prs[0]=="admin") {
		$app['area'] = 'admin';
		$app['areaPath'] = 'admin/';
		array_shift($prs);
		$noPrs--;
	} else if($prs[0]=="api" || $prs[0]=="user"){
		$app['area'] = $prs[0];
		$app['areaPath'] = $prs[0].'/';
		array_shift($prs);
		$noPrs--;
	}
	
	$app['prs'] = [];
	if(isset($prs[0])) $app['ctl'] = $prs[0];
	if(isset($prs[1])) {
		if(strpos($prs[1],"=") === false) {
			$app['act'] = $prs[1];
		} else if (strpos($prs[1],"?") !== false) {
			$app['act'] = explode("?", $prs[1])[0];
			$app['query'] = explode("?", $prs[1])[1];
		} else {
			$kv = explode("=",$prs[1]);
			$app['prs'][$kv[0]] = $kv[1];
		}
	}

	if($noPrs>2) {
		for($i=2; $i<$noPrs; $i++) {
			if(strpos($prs[$i],"=") !== false) {
				$kv = explode("=",$prs[$i]);
				$app['prs'][$kv[0]] = $kv[1];
			} else {
				$app['prs'][$i-1] = $prs[$i];
			}
		}
	}
}

$c = $app['ctl']."_controller";

if(isset($app['act']) && $app['act'] == 'server'){
	header('Location:'.$_SERVER['REQUEST_URI'].'admin/login');
}

if(!is_file(ControllerREL.$app['areaPath'].$c.".php")) {
	$c = "staticpages_controller";
	$app['ctl'] = "staticpages";	
	$app['act'] = "error";
}

$controller = new $c();

?>