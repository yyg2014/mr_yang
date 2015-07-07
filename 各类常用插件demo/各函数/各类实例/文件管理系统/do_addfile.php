<?php
	//要在哪个目录下创建文件
	$dir = rtrim($_POST['path'],"/")."/";
	
	//文件名称
	$fname = $_POST['fname'];
	
	//创建文件
	#file_put_contents($dir.$fname,"");
	touch($dir.$fname);
	
	header("location:index.php?dirname=".$dir);