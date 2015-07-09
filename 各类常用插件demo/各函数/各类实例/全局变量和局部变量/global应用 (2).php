<?php
	//声明一个函数
	function cesuo(){
		global $shi;//将全局变量拿到函数体内部来使用
		var_dump($shi);//全局变量  null
		$shi = "yellow";//全局变量 YELLOW
	}
	
	cesuo();
	
	var_dump($shi);//全局变量  yellow