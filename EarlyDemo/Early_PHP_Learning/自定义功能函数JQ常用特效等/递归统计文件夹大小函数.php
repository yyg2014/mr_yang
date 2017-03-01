<?php
	function dirsize($des){
		//1.判断$des是否存在
		if(!file_exists($des)){
			return false;
		}
		
		//2.打开目录
		$dir = opendir($des);	
		//3.定义一个用来存储文件大小总和的变量
		$i = 0;
		//4.开始读取文件，每次读取一个文件，将文件的大小统计
		while(false!==($f=readdir($dir))){
			//1.处理.和..
			if($f=='.'||$f=='..'){
				continue;
			}
			//2.生成路径+文件名的定位的变量
			$d = rtrim($des,"/")."/".$f;
			//3.将文件的大小统计下来
			$i += filesize($d);
			
			//判断$d是否为一个目录
			if(is_dir($d)){
				$i += dirsize($d);
			}
		}
		//5.返回所有文件的大小的总和就是文件夹的大小
		return $i;
	}
	
	function getsize($int){
		if($int<=1024){
			return $int." Byte";
		}elseif($int>pow(1024,4)){
			return round($int/pow(1024,4),2)." Tb";
		}elseif($int>pow(1024,3)){
			return round($int/pow(1024,3),2)." Gb";
		}elseif($int>pow(1024,2)){
			return round($int/pow(1024,2),2)." Mb";
		}elseif($int>pow(1024,1)){
			return round($int/pow(1024,1),2)." Kb";
		}
	}
	
	
	$des = "./test";
	
	echo getsize(dirsize($des));
	
	
	
	