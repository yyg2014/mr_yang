<?php
	header("content-type:text/html;charset=utf-8");
	$str = "12月26日(https://www.xinwen.net)，中共中央(ftp://www.zhongyang.org)在北京人民大会堂举行纪念毛泽东(http://www.maozedong.edu.cn)同志诞辰120周年座谈会。中共中央总书记、国家主席、中央军委主席***(http://www.aaa.com)发表重要讲话。新华社(http://www.xinhua.com.cn)记者 鞠鹏 摄";
	//http://www.xinwen.com
	
	$pattern = "/(http|https|ftp):\/\/\w+\.\w+\.(com|cn|net|org|gov|edu)(\.cn)?/";

	$pattern = "/(?:http|https|ftp):\/\/\w+\.\w+\.\w+(?:\.\w+)?/";
	
	echo preg_match_all($pattern,$str,$match);
	
	echo "<pre>";
	var_dump($match);
	echo "</pre>";
	//preg_replace();
	
	echo preg_replace($pattern,'<a href="">\\3</a>',$str);
	
	
	
	
	
	