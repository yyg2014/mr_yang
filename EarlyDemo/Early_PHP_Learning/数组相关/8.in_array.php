<?php
	$arr = array(1,2,3,'username'=>"psd1311",'age'=>1);
	
	//自定义一个函数，判断一个值是否属于一个数组的元素的值
	function in_arr($val,$array,$b=false){
		//1.判断$array是否为一个数组
		if(!is_array($array)){
			return false;
		}
		//2.开始遍历数组，将数组当中的值取出来
		foreach($array as $v){
			//3.每遍历一次，让元素的值跟第一个参数进行相等比较
			if($b){
				if($v === $val){
					//4.如果相等，说明，第一个参数存在于数组当中，返回真
					return true;
				}
			}else{
				if($v == $val){
					//4.如果相等，说明，第一个参数存在于数组当中，返回真
					return true;
				}
			}
			
		}
		//5.如果数组遍历完毕还没有返回，说明该值不存在与数组当中，直接返回假
		return false;
	}
	
	//判断一个值是否属于一个数组的元素的值
	var_dump(in_array(4,$arr));
	
	var_dump(in_array('psd1311',$arr));
	
	
	
	
	
	
	
	