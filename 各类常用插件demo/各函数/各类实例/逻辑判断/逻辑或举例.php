<?php
	$a = 100;
	
	$b = 200;
	
	//true || true  ---- true
	/*if($a>50 || $b>100){//或者
		echo "a=".$a;
		echo "<hr />";
		echo "b=".$b;
	}*/
	
	//false || true ----  true
	/*if($a<50 || $b>100){//或者
		echo "a=".$a;
		echo "<hr />";
		echo "b=".$b;
	}*/
	$a = 100;
	$b = 200;
	
	//有短路效果，只要有一个表达式为真，整体都为真
	//所以，第一个表达式为真，整体已经为真，第二个表达式就不用在执行了
	/*if($a>50 || $b=100){//或者
		echo "a=".$a;
		echo "<hr />";
		echo "b=".$b;
	}*/
	
	
	/*if($a<50 || $b>100){//或者
		echo "a=".$a;
		echo "<hr />";
		echo "b=".$b;
	}*/
	
	if($a>50 | $b=100){//或者
		echo "a=".$a;
		echo "<hr />";
		echo "b=".$b;
	}