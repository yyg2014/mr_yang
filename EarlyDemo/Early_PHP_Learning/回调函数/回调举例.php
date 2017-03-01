<?php
	header("content-type:text/html;charset=utf-8");
	//大明湖畔的张浩与大明湖畔的夏雨荷偶遇了
	//主功能函数
	function paoniu($func){
		echo "我看见了夏雨荷，好美啊！<br />";
		//想办法，使用一些方法来进行泡妞
		//echo $func;
		$func();//函数名称()  调用外部的规则函数
		echo "他们成功的在一起了！<br />";
	}
	//paoniu('dashan');
	paoniu("chifan");
	//paoniu('搭讪');
	//paoniu('');
	
	//定义泡妞的规则
	function dashan(){
		echo "小姐，我鼻子破了，请问有纸巾吗？<br />";
	}
	
	function kandianying(){
		echo "小妹妹，跟着大叔去看电影啊！<br />";
	}
	
	function chifan(){
		echo "你好，美女，能否赏个脸跟我一起吃个饭，我们去吃金钱豹！<br />";
	}
	
	function songshouji(){
		echo "小姐，我刚卖了个肾，买了个土豪金的ip5s，只为博得美人一笑！";
	}
	
	
	
	
	
	
	
	
	
	