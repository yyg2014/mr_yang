<?php
	//声明一系列的变量
	$a = 100;
	
	$b = $a++ + ++$a;
	/*
	 * $c = $a++;//$c = 100  $a = 101
	 * $d = ++$a;//$a = 102  $d = 102
	 * $b = $c+$d;//$b = 100 + 102
	 */
	
	echo "a=".$a;
	echo "<hr />";
	echo "b=".$b;
	
	//岳江山  ：a = 101   b = 202
	//刘林： a = 102   b = 想一下
	//陈金宾: a = 102   b = 203
	//b = 201  a = 102