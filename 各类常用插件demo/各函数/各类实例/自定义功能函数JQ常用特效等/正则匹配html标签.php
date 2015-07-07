<?php
	header("content-type:text/html;charset=utf-8");
	$str = "<div>12月26日(<b>https://www.xinwen.net</b>)，<abc 中共中央>(ftp://www.zhongyang.org)在<font color='red'>北京</font>人民大会堂举行纪念毛泽东(<span>http://www.maozedong.edu.cn</span>)同志诞辰120<abcdedfg>周年座谈会<img src='1.jpg' />。中共中央<i>总书记</i>、国家主席、<a href=''>中央军委</a>主席***(http://www.aaa.com)发表重要<hr />讲话。新华社(http://www.xinhua.com.cn)记者 鞠鹏 摄</div>";
	
	//echo $str;
	
	//echo $str = strip_tags($str);
	
	//找到所有的html标签
	
	//<img src /> <hr />  <hr>  <a href=''>      
	//</a>  </i>
	
	$pattern = "/<\/?[a-z]+([ \.a-z0-9='\/]+)?>/Ui";
	
	$pattern = "/<\/?[a-z]+.*>/Ui";
	
	//echo preg_match_all($pattern,$str,$match);
	
	/*echo "<pre>";
	var_dump($match);
	echo "</pre>";*/
	
	echo $str = preg_replace($pattern,'',$str);
	
	
	