<?php
	//定义一个变量
	$shi = "red";//全局变量

	//声明一个函数
	function cesuo(){
		var_dump($shi);//局部变量  NULL
		$shi = "yellow";//局部变量 YELLOW
	}
	
	cesuo();
	
	var_dump($shi);//全局变量  red