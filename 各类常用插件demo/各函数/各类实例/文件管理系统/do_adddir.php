<?php
	//1.接收参数
	$dname = $_POST['dname'];
	
	//创建目录
	$dir = rtrim($_POST['path'],"/")."/".$dname;
	
	mkdir($dir,0755);