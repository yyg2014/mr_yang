<?php
	//文件下载需要通知浏览器这个操作是下载操作
	
	//1.通知浏览器要下载的文件类型【可选】
	header("content-type:image/jpeg");
	
	//2.通知浏览器我们是要以附件的形式加载文件【必选】
	header("content-disposition:attachment;filename=1.jpg");
	
	//3.通知浏览器文件的大小【可选】
	header("content-length:".filesize("./1.jpg"));
	
	//4.输出文件
	readfile("./1.jpg");