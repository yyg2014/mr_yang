<?php
	$arr = array(1,2,3,'username'=>"psd1311",'age'=>1);
	
	//使用自定义函数模拟array_keys的功能
	
	function arr_keys($array){
		//1.先判断$array是不是一个数组
		if(!is_array($array)){
			return false;
		}
		
		//2.开始循环遍历$array，将这个数组当中的键名取出来
		foreach($array as $key=>$val){
			//3.将键名存入到新的数组当中
			$new_arr[] = $key;
			
		}
		//4.将新的数组返回
		return $new_arr;
		
	}
	
	echo "<pre>";
	var_dump($arr);
	echo "</pre>";
	
	//取出一个数组的所有的键名，以数组的形式返回
	$a = arr_keys($arr);
	
	echo "<pre>";
	var_dump($a);
	echo "</pre>";
	
	