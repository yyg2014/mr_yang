<?php
	session_start();

	//将所有的错误信息关闭掉
	error_reporting(0);

	//获取脚本运行的开始的时间戳
	Debug::getStart();
	
	header("content-type:text/html;charset=utf-8");
	
	//项目的文件夹
	define('PROJECT_PATH',str_replace("\\","/",dirname(dirname(__FILE__)))."/");
	//声明应用文件夹（前后台分为两个应用，home和admin）
	define('APP_PATH',rtrim(PROJECT_PATH.APP,"/")."/");
	
	//加载公共函数
	include PROJECT_PATH."core/functions.php";
	//判断应用的文件夹是否存在，如果不存在，去创建一个出来
	if(!file_exists(APP_PATH)){
		Create::mkFile();
	}
	
	//设置错误信息的显示形式
	set_error_handler(array('Debug','show_error'));
	
	//设置PATH_INFO模式
	Router::setUrl();
	
	//加载配置文件
	include PROJECT_PATH."config.inc.php";
	
	//设置默认加载路径
	$include_path = get_include_path();
	
	$include_path .= PATH_SEPARATOR.APP_PATH."controllers";
	$include_path .= PATH_SEPARATOR.APP_PATH."models";
	$include_path .= PATH_SEPARATOR.PROJECT_PATH."org";
	$include_path .= PATH_SEPARATOR.PROJECT_PATH."core";
	$include_path .= PATH_SEPARATOR.PROJECT_PATH."core/libs";
	$include_path .= PATH_SEPARATOR.PROJECT_PATH."core/libs/sysplugins";
	
	set_include_path($include_path);
	
	function __autoload($className){
		if(strtolower(substr($className,0,6))=='smarty'&&strtolower($className)!='smarty'){
			include strtolower($className).".php";
		}else{
			include strtolower($className).".class.php";
		}
	}
	
	$m = empty($_GET['m'])?"index":$_GET['m'];
	
	$a = empty($_GET['a'])?"index":$_GET['a'];
	
	$m = ucfirst(strtolower($m))."Action";
	
	//实例化之前，判断类文件是否存在
	if(!file_exists(APP_PATH."controllers/".$m.".class.php")){
		//判断模块文件如果不存在，就停止当前脚本
		Debug::addError("[<span style='color:red'>致命错误</span>]:当前模块不存在！");

	}else{
		//如果文件存在，才进行实例化操作
		$mod = new $m;
		//对smarty进行配置
		$mod->setTemplateDir(APP_PATH.TEMPLATEDIR);
		$mod->setCompileDir(PROJECT_PATH.COMPILEDIR);
		$mod->setCacheDir(PROJECT_PATH.CACHEDIR);
		$mod->left_delimiter = LEFT_DELIMITER;
		$mod->right_delimiter = RIGHT_DELIMITER;
		$mod->caching = CACHE;
		$mod->cache_lifetime = CACHE_LIFETIME;
		
		//调用指定的操作
		$mod->$a();

	}
	
	//获取脚本运行的结束的时间戳
	Debug::getEnd();
	
	//如果开启了DEBUG调试模式，就将错误信息显示
	if(defined('DEBUG')&&DEBUG==1){
		Debug::showTpl();	
	}

	