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
	//ini_set('display_errors','off');
	ini_set('log_errors','on');
	ini_set('error_log','syslog');
	
	//1.初始化系统日志
	define_syslog_variables();
	
	//2.开启系统日志链接
	openlog('php5',LOG_PID ,LOG_SYSLOG);
	
	//3.发送一条系统日志
	syslog(LOG_NOTICE,"123123");
	
	//4.关闭连接
	closelog();
	
	
	
	
	
	
	
	
	
	
	