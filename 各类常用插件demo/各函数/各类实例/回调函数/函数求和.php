<?php
	//完成一个功能，输入多个参数，来完成多个参数的和
	echo sum(1,2,3,4,5,6,7,8,9);
	
	#echo sum(1,2,3,4,5,6,7,8,9,10,11,12);
	
	#echo sum(1,3,5,4,5,6,7);
	
	function sum(){
		//使用访问可变参数长度列表的函数
		//func_get_args()
		/*echo "<pre>";
		var_dump(func_get_args());
		echo "</pre>";*/
		$nums = func_get_args();//获取所有的实际参数，存入到一个数组当中返回
		//echo count($nums);//获取一个数组的元素个数的长度
		//遍历数组
		#echo $nums[0]+$nums[1]+$nums[2]...;
		for($i=0,$sum=0;$i<=count($nums)-1;$i++){
			$sum += $nums[$i];
		}
		return $sum;
	}