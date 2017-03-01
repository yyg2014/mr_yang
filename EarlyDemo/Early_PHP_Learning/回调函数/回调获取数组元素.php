<?php
	//完成一个功能，输入多个参数，来完成多个参数的和
	echo sum(1,2,3,4,5,6,7,8,9,10);
	
	function sum(){
		//func_get_arg($i)
		
		//echo func_get_arg(1);获取指定索引的实际参数的值
		//func_num_args()获取所有的实际参数的个数
		
		//echo func_num_args();
		for($i=0,$sum=0;$i<func_num_args();$i++){
			$sum += func_get_arg($i);
		}
		
		return $sum;
	}