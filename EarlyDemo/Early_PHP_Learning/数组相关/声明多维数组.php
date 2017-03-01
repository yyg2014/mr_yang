<?php
	header("content-type:text/html;charset=utf-8");
	//使用array来定义一个多维数组
	$news = array(
				"news"=>array(
							array(
								'title'=>"李亚鹏和王菲离婚",
								'liyapeng'=>array(
											'射雕英雄传',
											'笑傲江湖',
											'将爱情进行到底',
										),
								'wangfei'=>array(
											'movie'=>array(
													'天下无双',
													'河东狮吼'
												),
											'music'=>array(
													'红豆',
													'传奇',
													'因为爱情',
													'我愿意',
												)
										)
							),
							array(
								'title'=>"西藏地震",
								'jibie'=>"4.7级",
								'shendu'=>'12公里',
								'lvyou'=>array(
										'布达拉宫',
										'大草原',
									),
								'info'=>array(
										'喇嘛',
										'小肥羊',
										'藏羚羊',
										'藏红花',
										'牦牛',
										'天山雪莲',
									)
							)
					)
			);
	
	unset($news['news'][0]['wangfei']['movie'][1]);
	
	unset($news['news'][0]['wangfei']['music'][1]);
	
	echo "<pre>";
	var_dump($news);
	echo "</pre>";
	
	echo $news['news'][0]['liyapeng'][0];
	
	echo $news['news'][1]['info'][5];
	
	echo $news['news'][0]['wangfei']['movie'][1];