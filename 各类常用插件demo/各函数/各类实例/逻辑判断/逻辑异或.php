<?php
	// true xor true----false
	$a = true;
	
	$b = true;
	
	//true xor false --- true
	
	$a = true;
	
	$b = false;
	
	//false xor true ---  true
	
	$a = false;
	
	$b = true;
	
	//false xor false ---  false
	
	$a = false;
	
	$b = false;
	
	if($a xor $b){
		echo "true";
	}else{
		echo "false";
	}