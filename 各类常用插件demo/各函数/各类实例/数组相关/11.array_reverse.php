<?php
	$arr = array(1,2,3,'username'=>"psd1311",'age'=>10);
	
	function arr_reverse($array){
		//1.判断$array是否为数组
		if(!is_array($array)){
			return false;
		}
		
		//2.将数组的指针移动到末尾
		end($array);
		
		//3.开始遍历数组
		do{
			if(is_string(key($array))){//如果是关联数组，保留键名
				//4.循环将数组的元素的键值存入到新的数组当中，然后将指针向前移动一位
				$new_arr[key($array)] = current($array);	

			}else{//如果是索引数组不保留键名
				$new_arr[] = current($array);
			}

		//5.直到先前移动指针函数返回假（走到第一个元素），跳出循环
		}while(prev($array));
		
		//6.返回新数组
		return $new_arr;
	}
	
	echo "<pre>";
	var_dump($arr);
	echo "</pre>";
	
	//将数组的值进行翻转，保留键名
	$new = arr_reverse($arr);//strrev
	
	echo "<pre>";
	var_dump($new);
	echo "</pre>";