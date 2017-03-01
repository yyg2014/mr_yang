<?php
	$a = 100;
	
	/*if($a>10){
		$b = 10;
	}else{
		$b = 20;
	}*/
	
	//exp1?exp2:exp3
	
	//先判断exp1表达式是否为真，如果为真，执行exp2
	//否则执行exp3
	
	//($a>10)?($b=10):($b=20);
	
	//echo $b;
	$a = 100;
	if($a>10){
		echo 20;
	}else{
		echo 30;
	}
	
	echo ($a>10)?20:30;