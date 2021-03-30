<?php
 require_once('backend/config/config.php');
 require_once ('backend/libs/Controller.php');
 require_once ('backend/libs/Model.php');
 require_once ('backend/libs/View.php');
 // require_once ('libs/SessionHelper.php');
$url = $_GET['url'];
 
$urlarray= explode('/', $url);
//controller
$cn = ucfirst($urlarray[0]);
//file location
$cfname = 'controller/'.$cn.'.php';

//creating object of controller file 
if (file_exists($cfname)) {
	require_once $cfname;
	$obj = new $cn();

	if (method_exists($obj, $urlarray[1])) {
		if (isset($urlarray[2]) && !empty($urlarray[2])) {
			$obj->$urlarray[1]($urlarray[2]);
		}else{
		$obj->$urlarray[1]();
	}
}else{
		echo $urlarray[1].' Method not found';
	}
}else{
	echo $cn.' Not Found';
}




?>