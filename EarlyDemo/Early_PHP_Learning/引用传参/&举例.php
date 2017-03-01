<?php
	//定义一个函数abc
	function abc($a){
		$a++;
	}
	
	//定义一个变量$b
	$b = 100;
	
	abc(&$b);//可以让$a与$b互为别名  $a = &$b
	
	echo $b;