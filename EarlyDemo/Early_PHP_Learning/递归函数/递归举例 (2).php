<?php
	//扩展题：使用递归函数完成1-100的累加
	/*for($i=1,$sum=0;$i<=100;$i++){
		$sum += $i;
	}
	
	echo $sum;*/
	
	function leijia($n){
		static $i = 1;//初始化变量$i，只会初始化一次
		static $sum = 0;//初始化变量$sum，只会初始化一次
		if($i<=$n){//判断$i<=100，相当于for循环的第二个表达式
			$sum += $i;//相当于for循环的循环体
			$i++;//相当于第三个表达式
			leijia($n);
		}
		return $sum;
	}
	
	echo leijia(10);