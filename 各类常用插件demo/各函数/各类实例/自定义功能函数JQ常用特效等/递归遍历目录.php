<?php
	function rdir($des){
		//先判断传进来目录是否存在
		if(!file_exists($des)){
			return false;
		}
		
		//1.打开目录
		$dir = opendir($des);
		
		//2.读取文件
		while(false!==($f=readdir($dir))){
			//3.处理文件
			//1.跳过.和..的操作
			if($f=='.'||$f=='..'){
				continue;
			}
			
			//2.生成一个定位路径
			//1.txt    ./test/1.txt
			$d = rtrim($des,"/")."/".$f;
			echo $f."----".filetype($d)."<hr />";
			
			//3.如果遇到文件夹，调用自己做相同的操作读取
			if(is_dir($d)){
				rdir($d);
			}	
		}
		//4.关闭目录
		closedir($dir);
	}
	
	$des = "./test";
	
	rdir($des);
	
	
	
	