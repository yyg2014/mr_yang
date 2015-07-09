<?php
	header("content-type:text/html;charset=utf-8");
	//计算器的函数
	//完成计算的主功能
	function jisuan($num1,$num2,$op){
		//return jia(1,2);
		//return 3;
		return $op($num1,$num2);
	}
	
	echo jisuan(1,2,"jia");//echo 3
	
	echo jisuan(1,2,"chu");
	
	echo jisuan(1,0,"chu");
	
	//加法规则，来辅助主函数完成计算功能
	function jia($num1,$num2){
		return $num1+$num2;//return 3
	}
	
	function jian($num1,$num2){
		return $num1-$num2;
	}
	
	function cheng($num1,$num2){
		return $num1*$num2;
	}
	
	function chu($num1,$num2){
		if($num2==0){
			return '0不能被整除！';
		}
		return $num1/$num2;
	}
	
	function mo($num1,$num2){
		return $num1%$num2;
	}
	
	
	