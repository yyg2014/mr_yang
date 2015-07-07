<?php
	echo "<pre>";
	//var_dump($_ENV);
	echo "</pre>";
	
	echo "<pre>";
	var_dump($_SERVER);
	echo "</pre>";
	
	echo $str = $_SERVER['QUERY_STRING'];
	
	parse_str($str);
	echo "<br />";
	echo $id;
	echo "<br />";
	echo $username;
	
	echo "<hr />";
	
	echo time();
	echo "<br />";
	echo $_SERVER['REQUEST_TIME'];
	
	echo "<pre>";
	var_dump($_FILES);
	echo "</pre>";
	
	echo "<pre>";
	var_dump($_GET);
	echo "</pre>";
	
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
	
	echo "<pre>";
	var_dump($_REQUEST);
	echo "</pre>";
	
	echo "<pre>";
	var_dump($GLOBALS);
	echo "</pre>";
	
	
	
	