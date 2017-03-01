<?php
	//使用递归函数统计1-100的累加
	function sum($num=100){
		if($num==1){
			return 1;
		}
		return $num+sum($num-1);
		//100+99+98+97+96+...+2+1
	}
	
	$dir = "../";
	
	getdir($dir);
	
	function getDir($dir){
	
		$d = opendir($dir);
		
		while($f=readdir($d)){
			if($f=='.'||$f=='..'){
				continue;
			}
			$filename = rtrim($dir,"/")."/".$f;
			echo $f."-----".filetype($filename);
			echo "<hr />";
			if(is_dir($filename)){
				getdir($filename);
			}
		}
	
	}
	
	
	
	
	
	
	
	
	
	
	