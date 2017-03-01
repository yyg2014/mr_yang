<?php
	class Router{
		public static function setUrl(){
			//index.php?m=user&a=index
			//如果没有pathinfo模式，就不需要处理参数
			if(empty($_SERVER['PATH_INFO'])){
				return false;
			}
			
			//index.php/user/index/id/1
			//    user/index/id/1
			// user,index,id, 1 ,username,zhangsan
			//   0   1     2  3     4         5
			
			//接收pathinfo信息，并且处理
			$params = explode("/",trim($_SERVER['PATH_INFO'],"/"));
			
			$c = count($params);
			
			//对$_GET参数进行赋值
			if($c==2){
				$_GET['m'] = $params[0];
				$_GET['a'] = $params[1];
			}
			
			if($c>2){
				$_GET['m'] = $params[0];
				$_GET['a'] = $params[1];
				for($i=2;$i<$c;$i=$i+2){
					//if($i%2==0){
						$_GET[$params[$i]] = $params[$i+1];
					//}
				}
			}
		}
	}
	