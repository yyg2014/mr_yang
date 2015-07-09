<?php
	test(3);
	function test($n){
		echo $n."&nbsp;&nbsp;";//echo 3
		if($n>0){//3>0
			test1($n-1);//test1(2)
		}else{
			echo " <--> ";
		}
		echo $n."&nbsp;&nbsp;";//echo 3
	}
	function test1($n){
		echo $n."&nbsp;&nbsp;";//echo 2
		if($n>0){
			test2($n-1);//test2(1)
		}else{
			echo " <--> ";
		}
		echo $n."&nbsp;&nbsp;";//echo 2
	}
	
	function test2($n){
		echo $n."&nbsp;&nbsp;";//echo 1
		if($n>0){
			test3($n-1);//test3(0)
		}else{
			echo " <--> ";
		}
		echo $n."&nbsp;&nbsp;";//echo 1
	}
	
	function test3($n){
		echo $n."&nbsp;&nbsp;";//echo 0
		if($n>0){
			test3($n-1);
		}else{
			echo " <--> ";//echo <-->
		}
		echo $n."&nbsp;&nbsp;";//echo 0
	}