<?php
	//声明一个数组
	$arr = array('a'=>100,'b'=>200);
	
	end($arr);//将数组的指针移动到最后一位
	
	echo key($arr)."----".current($arr)."<br />";
	
	reset($arr);//将数组的指针移动到数组的开头
	
	next($arr);//将数组的指针向后移动一位
	
	prev($arr);//将数组的指针向前移动一位
	
	echo key($arr)."----".current($arr)."<br />";