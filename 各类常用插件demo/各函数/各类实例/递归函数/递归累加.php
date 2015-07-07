<?php
	function leijia($n){
		if($n==1){
			return 1;
		}
		return $n+leijia($n-1);//return 100+99+98+...+2+1
	}
	
	echo leijia(1000);
	
	//1,3,4,5.........999