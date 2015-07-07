<?php
	//定义一个变量
	$shi = "red";//全局变量

	//声明一个函数
	function cesuo(){
		global $shi;//将全局变量拿到函数体内部来使用
		var_dump($shi);//全局变量  red
		$shi = "yellow";//全局变量 YELLOW
	}
	
	cesuo();
	
	var_dump($shi);//全局变量  yellow