<?php	

	class Model extends Db{	

		public static function getObj($tabName){
			
		//接收要实例化的Model的类的名称
			$class = ucfirst($tabName)."Model";

			//使用eval将一个字符串解析

			//$s = UserModel::$obj;

			eval('$s = '.$class.'::$obj;');

			//判断UserModel是否已经被实例化

			if(is_null($s)){	

			//通过eval实例化对象		
	
			//UserModel::$obj = new UserModel("user");
	
			eval($class.'::$obj = new '.$class.'("'.$tabName.'");');

			}			

			//返回对象

			//$o = UserModel::$obj;

			eval('$o = '.$class.'::$obj;');
			return $o;
		}		
	}


