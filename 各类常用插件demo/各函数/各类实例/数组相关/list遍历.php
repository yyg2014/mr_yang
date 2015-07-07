<?php
	//声明一个数组
	$arr = array(111,222,3333);//list只适用于下标连续的索引数组
	
	$arr = array("a"=>1,"b"=>2,"c"=>3);
	
	list($one,$two,$three) = $arr;//array(111,222,3333)
	//list(0,1,2)
	
	echo $one;
	
	echo "<hr />";
	
	echo $two;
	
	echo "<hr />";
	
	echo $three;
	
	echo "<hr />";
	
	echo $four;
	
	echo "<hr />";
	
	echo $five;
	
	echo "<hr />";
	
	echo $six;