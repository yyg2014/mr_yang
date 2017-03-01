<?php
	$arr = array('a'=>1,2,'b'=>3,4,5);
	
	//输出每一个元素的键值，然后将数组的指针向后移动一位
	/*echo key($arr)."----".current($arr)."<br />";
	//将指针向后移动一位
	next($arr);
	
	echo key($arr)."----".current($arr)."<br />";
	next($arr);
	
	echo key($arr)."----".current($arr)."<br />";
	next($arr);
	
	echo key($arr)."----".current($arr)."<br />";
	next($arr);
	
	echo key($arr)."----".current($arr)."<br />";
	next($arr);*/
	
	//只要不是最后一个元素，$key永远不会为NULL
	while(NULL!==($key=key($arr))){
		echo $key."----".current($arr)."<br />";
		next($arr);
	}
	
	//var_dump(key($arr));
	//echo key($arr)."----".current($arr)."<br />";
	//next($arr);