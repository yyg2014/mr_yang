<?php
	$a = true;
	
	$b = false;
	
	
	//true && false----false
	
	$a = false;
	
	$b = true;
	
	//false && true ---- false
	
	$a = true;
	
	$b = true;
	
	//true && true ---  true
	
	$a = false;
	
	$b = false;
	
	//false && false ---false
	if($a && $b){//并且
		echo "<img src='./images/3.jpg' />";
	}else{
		echo "<img src='./images/4.jpg' />";
	}