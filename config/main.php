<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Config global constant variable

$domain = $_SERVER["SERVER_NAME"];
if($_SERVER["SERVER_PORT"] != 80)
	$domain .= ":".$_SERVER["SERVER_PORT"];
//$domain = "pscd.pacificsoftdev.com";
	
$relRoot = dirname($_SERVER['SCRIPT_NAME']);
//$relRoot = "/";
if(substr($relRoot, -1) != "/") $relRoot .= "/";

//**local**
define('RootURL', 'http://'.$domain.$relRoot);
define('RootABS', 'http://'.$domain);

//**server**
// define('RootURL', 'https://'.$domain.$relRoot);
// define('RootABS', 'https://'.$domain);

define('RootREL', $relRoot);
define('UploadREL', 'media/upload/');
define('UploadURI', $relRoot.UploadREL);
define('RootURI', dirname($_SERVER['SCRIPT_FILENAME'])."/");
//define('RootURI', '/home1/softdev/public_html/pacificsoftdev.com/pscd/');

define('ControllerREL', 'controllers/');
define('AdminPath', 'admin');
define('ControllerAdminREL', ControllerREL."/".AdminPath);
define('AdminEmail', 'duongqhai@gmail.com');
define('PSCDEmail', 'no-reply@enlight21.com');
define('PassEmail', 'Claudiu33!');

// Global variables
$app = [];
$app['area'] = 'users';
$app['areaPath'] = '';

$app['roles'] = [
	'1'=>'admin',
	'2'=>'user'
];

$app['recordTime'] = [
	'created'	=>	'created',
	'updated'	=>	'updated'
];

$app['months'] = [
	'January',
	'February',
	'March',
	'April',
	'May',
	'June',
	'July',
	'August',
	'September',
	'October',
	'November',
	'December',
];

$app['weekdays'] = [
	'Monday',
	'Tuesday',
	'Wednesday',
	'Thursday',
	'Friday',
	'Saturday',
	'Sunday'
];

$app['gender'] = [
	'1' => 'Male',
	'0' => 'Female'
];

$app['notify_actions'] = [
	'1' => ['value' => 'My Friends post a post' , 'status' => '1'],
	'2' => ['value' => 'I’m getting a new friend request' , 'status' => '1'],
	'3' => ['value' => 'My post get’s approved' , 'status' => '1'],
	'4' => ['value' => 'I’m getting a new comment' , 'status' => '1'],
	'5' => ['value' => 'Disable all email notifications' , 'status' => '0'],
];

include_once(__DIR__.'/database.php');
//require_once __DIR__.'/config/main.php';
?>