<?php
	$arr = array(1,2,3,'username'=>"psd1311",'age'=>10);
	
	function arr_flip($array){
		//1.判断$array是否为数组
		if(!is_array($array)){
			return false;
		}
		
		//2.遍历数组，将这个数组的键和值都拿到
		foreach($array as $key=>$val){
			//3.设置一个新的数组，这个新的数组的键是就数组的值，这个新数组的值是旧数组的键
			$new_arr[$val] = $key;
			//$new_arr[1]=0
			//$new_arr[2]=1
		}

		//4.返回新数组
		return $new_arr;
	}
	
	$arr = array(1,2,3,'age'=>1);
	
	echo "<pre>";
	var_dump($arr);
	echo "</pre>";
	
	$new = arr_flip($arr);
	
	echo "<pre>";
	var_dump($new);
	echo "</pre>";