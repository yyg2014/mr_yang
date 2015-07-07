<?php
	function M($name){
		//user   home/models/usermodel.class.php
		if(file_exists(APP_PATH."models/".strtolower($name."model.class.php"))){
			//如果UserModel文件存在
			//实例化UserModel
			$obj = Model::getObj($name);
			$obj->setTable($name);//设置表名称
			return $obj;//UserModel对象
		}else{
			//如果UserModel文件不存在
			//将表名传递给DB类
			$obj = Db::getObj($name);//Db对象
			$obj->setTable($name);//设置表名称
			return $obj;//DB
		}
	}
	
	function p($var){
		echo "<pre>";
		var_dump($var);
		echo "</pre>";
	}
	
	
	
	
	