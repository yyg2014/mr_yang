<?php
	class MyTpl extends Smarty{
	
		public function display($f=""){
			//获取当前模块的URL地址
			$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."/".$_GET['m'];
			
			//将这个地址发送到模板当中
			$this->assign("url",$url);
		
			if(empty($f)){
				$m = empty($_GET['m'])?"index":$_GET['m'];
				$a = empty($_GET['a'])?"index":$_GET['a'];
				$file = $m."/".$a.".html";
				parent::display($file);
			}elseif($f=='sysinfo.html'){
				parent::display($f);
			}else{
				$m = empty($_GET['m'])?"index":$_GET['m'];
				parent::display($m."/".$f);
			}
		}
		//当调用一个不存在的成员方法的时候会自动调用
		public function __call($func,$params){
			Debug::addError("[<span style='color:red'>致命错误</span>]:您调用的方法:".$func."不存在");
			return false;
		}
		
		//显示成功的提示信息
		public function success($info,$time,$redirect){
			$this->assign("info",$info);
			$this->assign("ico",'√');
			$this->assign('timer',$time);
			$this->assign('location',"http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."/".$redirect);
			$this->display('sysinfo.html');
		}
		
		//显示错误的提示信息
		public function error($info,$time,$redirect){
			$this->assign("info",$info);
			$this->assign("ico",'X');
			$this->assign('timer',$time);
			$this->assign('location',"http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."/".$redirect);
			$this->display('sysinfo.html');
		}
		
		
		
		
		
		
	}