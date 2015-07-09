<?php
	//声明一个数组
	$arr = array('a'=>111,"b"=>200);
	
	//使用list之前，我们先用一个函数each来处理一下
	
	/*$d = each($arr);//第一个元素
	list($one,$two) = $d;
	echo "<pre>";
	var_dump($d);
	echo "</pre>";
	echo $one."---".$two."<br />";
	
	$d = each($arr);//拿到的是数组的第二个元素
	list($one,$two) = $d;
	echo "<pre>";
	var_dump($d);
	echo "</pre>";
	echo $one."---".$two."<br />";
	
	$d = each($arr);//拿到的是数组的第二个元素
	list($one,$two) = $d;
	echo "<pre>";
	var_dump($d);
	echo "</pre>";
	echo $one."---".$two."<br />";*/
	
	$arr = array('a'=>111,"b"=>200);
	
	$arr = array(100=>2,'a'=>3);
	
	while(list($one,$two) = each($arr)){
		//list($one,$two) = $d;//array(0=>a,1=>111)
		echo $one."---".$two."<br />";
	}
	
	
	
	
	
	
