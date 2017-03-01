<?php
	$arr = array(1,2,3,'username'=>"psd1311",'age'=>1);
	
	//自定义一个函数，模拟array_values的功能
	function arr_values($array){
		//1.判断传入进来的参数是否为一个数组
		if(!is_array($array)){
			return false;
		}
		//2.对数组进行遍历，将数组的值取出来
		foreach($array as $val){
			//3.将$val的值存入到一个新的数组当中
			$new_arr[] = $val;
		}
		//4.将新的数组返回
		return $new_arr;
		
	}
	
	echo "<pre>";
	var_dump($arr);
	echo "</pre>";
	
	//取出一个数组的所有的值，以数组的形式返回
	$a = arr_values($arr);
	
	echo "<pre>";
	var_dump($a);
	echo "</pre>";
	
	
	
	