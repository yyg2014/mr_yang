<?php
	$arr1 = array(1,2,3,4);
	
	$arr2 = array(4=>5,5=>6,6=>7,7=>8);
	
	$arr3 = array(9,10,11,12);
	
	$arr4 = array('user'=>13,14,15,16);
	
	$arr5 = array(100,200,300);
	
	//合并多个数组
	#$arr5 = array_merge($arr1,$arr2,$arr3,$arr4);
	
	echo "<pre>";
	#var_dump($arr5);
	echo "</pre>";
	
	//func_get_args
	//func_num_args
	//func_get_arg(0)
	function arr_merge(){
		//1.接收所有的实参
		$args = func_get_args();
		
		//2.将接收回来的数据（数组）遍历
		foreach($args as $val){
			//将每一个$val(是一个数组)遍历，遍历出的值存入到新的数组当中
			foreach($val as $k=>$v){
				if(is_string($k)){
					$new_arr[$k] = $v;
				}else{
					$new_arr[] = $v;
				}
			}
		}
		
		//返回新的数组
		return $new_arr;
	}
	
	var_dump(arr_merge($arr1,$arr2,$arr3,$arr4,$arr5));
	
	
	
	
	
	
	
	
	