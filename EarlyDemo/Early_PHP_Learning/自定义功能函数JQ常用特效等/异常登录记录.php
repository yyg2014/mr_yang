<?php
	header("content-type:text/html;charset=utf-8");
	/*
	 *  error_reporting= E_ALL//将向PHP发送每个错误
		display_errors=Off //不显示错误报告
		log_errors=On //决定日志语句记录的位置
		log_errors_max_log=1024// 每个日志项的最大长度
		error_log=G:/myerror.log //指定错误写进的文件
	 */

	error_reporting(E_ALL);
	ini_set('display_errors','off');
	ini_set('log_errors','on');
	ini_set('error_log','D:/error.log');
	
	if($_POST['username']=='admin'&&$_POST['password']=="123"){
		echo "登录成功！";
	}else{
		error_log("用户".$_POST['username']."在时间:".date("Y-m-d H:i:s")."尝试使用密码:".$_POST['password']."进行登录，尝试的IP地址为:".$_SERVER['REMOTE_ADDR']);
	}
	
	
	
	
	
	
	
	