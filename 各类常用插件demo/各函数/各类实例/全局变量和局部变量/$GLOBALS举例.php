<?php
	//定义一个全局变量
	$shi = "green";
	/*echo "<pre>";
	var_dump($GLOBALS);
	echo "</pre>";*/
	
	//echo $GLOBALS['shi'];
	
	function cesuo(){
		/*echo "<pre>";
		var_dump($GLOBALS);//超全局数组
		echo "</pre>";*/
		var_dump($GLOBALS['shi']);//全局变量 green
		$GLOBALS['shi'] = "red";
		var_dump($GLOBALS['shi']);//全局变量 red
	}
	
	cesuo();
	
	echo $shi;//全局变量 RED
	
	
	