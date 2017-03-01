<?php
	header("content-type:text/html;charset=utf-8");
	//大明湖畔的张浩与大明湖畔的夏雨荷偶遇了
	//主功能函数
	function paoniu($func){
		echo "我看见了夏雨荷，好美啊！<br />";
		//想办法，使用一些方法来进行泡妞
		//判断传进来的函数名称是否被定义过
		if(!function_exists($func)){
			echo "您好，您要找的这个方法不存在！";
			return false;
		}else{
			$func();//函数名称()  调用外部的规则函数
		}
		echo "他们成功的在一起了！<br />";
	}
	paoniu("chifan1");
	
	//定义泡妞的规则
	function chifan(){
		echo "你好，美女，能否赏个脸跟我一起吃个饭，我们去吃金钱豹！<br />";
	}
	
	
	
	
	
	
	
	