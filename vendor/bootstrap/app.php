<?php
session_start();
$app['ctl'] = "home";
$prs = [];

if(isset($_GET["pr"])) {
	$par = $_GET["pr"];
	$str_url = $_SERVER['REQUEST_URI'];
	// echo "Start <br/>"; echo '<pre>'; print_r($str_url);echo '</pre>';exit("End Data");
    if(strpos($str_url, "blogs/view")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(strpos($str_url, "news/view")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(strpos($str_url, "films/review")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(strpos($str_url, "books/book_review")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(strpos($str_url, "book-groups/review")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(strpos($str_url, "opinions-debates/view")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}else if(strpos($str_url, "queries/view")){
		$app['linkpage'] = "null";
		$prs = explode("/","404/index");
	}
	
	else {

		if(preg_match('/\/$/', $par) && !preg_match('/\/\/$/', $_SERVER['REQUEST_URI'])){
			$par = substr($par, 0, -1);
		}
		if(preg_match('/\/\/$/', $_SERVER['REQUEST_URI'])){
			$app['linkpage'] = "null";
			$prs = explode("/","404/index");
		} else{ 

			$prs = explode("/",$_GET["pr"]);
			if ($prs[0] && strlen($prs[0]) > 0 && count(explode("-", $prs[0])) > 1 ) {
				$prs[0] = str_replace("-", "_", $prs[0]);
			}
			if ($prs[1] && strlen($prs[1]) > 0 && count(explode("-", $prs[1])) > 1 ) {
				$prs[1] = str_replace("-", "_", $prs[1]);
			}
			// if ($prs[0] == "privacy_policy" || $prs[0] == "terms_of_use" || $prs[0] == "about" ) {
			// 	$prs[2] = str_replace("_", "-", $prs[0]);
			// 	$prs[0] = "page";
			// 	$prs[1] = "index";
			// }

			$link_url = $_SERVER['REQUEST_URI'];

			if (!preg_match('/index\?cat=/', $link_url, $matches) && !preg_match('/index\?page=/', $link_url, $matches) && !preg_match('/index\?search=/', $link_url, $matches) ) {
				if(preg_match('/blogs\/(.*)/', $link_url, $matches) && !preg_match('/user\/blogs/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","blogs/view/".$matches[1]);
				}else if(preg_match('/community-blogs\/(.*)/', $link_url, $matches) && !preg_match('/user\/blogs/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","community_blogs/view/".$matches[1]);
				} else if(preg_match('/news\/(.*)/', $link_url, $matches) && !preg_match('/user\/news/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","news/view/".$matches[1]);
				} else if(preg_match('/films\/(.*)/', $link_url, $matches) && !preg_match('/user\/films/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","films/review/".$matches[1]);
				} else if(preg_match('/books\/(.*)/', $link_url, $matches) && !preg_match('/books\/index/', $link_url) && !preg_match('/user\/books/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","books/book_review/".$matches[1]);
				} else if(preg_match('/book-groups\/(.*)/', $link_url, $matches) && !preg_match('/user\/book-groups/', $link_url) && !preg_match('/admin/', $link_url) && !preg_match('/book-groups\/book-review/', $link_url) ){
					$prs = explode("/","book_groups/review/".$matches[1]);
				} else if(preg_match('/opinions-debates\/(.*)/', $link_url, $matches) && !preg_match('/user\/opinions-debates/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","opinions_debates/view/".$matches[1]);
				} else if(preg_match('/queries\/(.*)/', $link_url, $matches) && !preg_match('/user\/queries/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","queries/view/".$matches[1]);
				} else if(preg_match('/election-central\/(.*)/', $link_url, $matches) && !preg_match('/user\/election-central/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","election_central/view/".$matches[1]);
				} else if(preg_match('/must-reads\/(.*)/', $link_url, $matches) && !preg_match('/user\/must-reads/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","must_reads/view/".$matches[1]);
				} else if(preg_match('/environment\/(.*)/', $link_url, $matches) && !preg_match('/user\/environment/', $link_url) && !preg_match('/admin/', $link_url) ){
					$prs = explode("/","environment/view/".$matches[1]);
        } 
        else {
          $arrCtrl = [
            'news',
            'films',
            'books',
            'book_groups',
            'blogs',
            'opinions_debates',
            'queries',
            'home',
            'login',
            'register'
          ];
          if(!preg_match('/user\//', $link_url) && !preg_match('/admin/', $link_url) && !in_array( $prs[0], $arrCtrl)){
            $prs[2] = str_replace("_", "-", $prs[0]);
            $prs[0] = "page";
            $prs[1] = "index";
          }
        }
			}

		}
		
	}

	
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