<?php
	$arr = array(1,2,3,'username'=>"psd1311",'age'=>1);
	
	function arr_key_exists($key,$array){
		//1.判断$array是否是一个数组
		if(!is_array($array)){
			return false;
		}
		
		//2.遍历数组，取出所有的键
		foreach($array as $k=>$val){
			//3.判断每个元素的键名是否与第一个参数$key相等
			if($k === $key){
				//4.如果相等，返回true
				return true;
			}
		}
		//5.如果遍历完毕都没有返回，说明该数组当中没有这个键，返回false
		return false;
	}

	
	var_dump(arr_key_exists('psd1311',$arr));
	
	#var_dump(arr_key_exists('username',$arr));