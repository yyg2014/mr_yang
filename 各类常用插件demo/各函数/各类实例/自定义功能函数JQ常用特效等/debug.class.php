<?php
	class Debug{
		//设置所有的错误级别
		private static $errType = array(
				E_ERROR=>"运行时致命错误",
				E_WARNING=>"运行时警告",
				E_PARSE=>"编译时语法解析错误",
				E_NOTICE=>"运行时通知",
				E_STRICT=>"标准化建议"
		);
		
		//用来接收错误信息的属性
		private static $errInfo = array();
		
		//保存脚本运行的开始时间
		private static $start;
		
		//保存脚本运行的结束时间
		private static $end;
	
		//每发生一次错误，都会调用到此方法，将错误信息存入到成员属性errInfo当中
		public static function show_error($errno,$errstr,$errfile,$errline,$errcontext){
			//先来合成要保存的错误信息
			$str = "[<font color='red'>".self::$errType[$errno]."</font>]:".$errstr."，错误发生在文件：".$errfile." 的第 ".$errline." 行";
			
			//将错误信息存下来
			self::$errInfo[] = $str;
		}
		
		//定义错误信息的模板
		private static function errTpl(){
			return '<div style="width:90%%;background:#eee;border:1px solid #ccc;padding:10px;margin:0 auto;font-size:8px;margin-top:20px;">[<font color="green">运行时间</font>]:%.7f秒<p />%s<p />[<font color="green">加载文件</font>]:%s</div>';
		}
		
		//显示错误信息
		public static function showTpl(){
			printf(self::errTpl(),self::spent(),join("<br />",self::$errInfo),self::getFiles());
		}
		
		//添加一个错误信息
		public static function addError($error){
			self::$errInfo[] = $error;
		}
		//设置脚本运行的开始时间
		public static function getStart(){
			self::$start = microtime(true);
		}
		
		//设置脚本运行的结束时间
		public static function getEnd(){
			self::$end = microtime(true);
		}
		
		//计算脚本运行的消耗时间
		public static function spent(){
			return self::$end - self::$start;
		}
		
		//获取所有已经加载过的文件
		private static function getFiles(){
			return join("<br />",get_included_files());
		}
		
	}
	
	
	
	
	
	
	
	