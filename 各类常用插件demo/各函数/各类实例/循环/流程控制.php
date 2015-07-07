<?php
	for($i=1;$i<=100;$i++){
		if($i==9){
			#continue;//跳出本次循环，继续下次循环
			#break;//终止循环
			#exit();//终止当前脚本，遇到此代码，后续所有的内容都不会执行
			die("stop");//同exit
		}
		echo $i."<br />";
	}
	
	echo "后续代码！";
	
	echo 11111;
	echo 2222;