<?php
	class Create{
		public static function mkFile(){
			//1.创建应用文件夹
			mkdir(APP_PATH);
			
			//2.创建MVC的文件夹
			mkdir(APP_PATH."controllers");
			mkdir(APP_PATH."models");
			mkdir(APP_PATH."views");
			
			//3.创建indexaction.class.php文件
			$str = <<<EOT
<?php
	class IndexAction extends MyTpl{
		public function index(){
			echo "创建应用文件夹成功<br />";
			echo "创建MVC文件夹成功<br />";
			echo "创建首页模块成功<br />";
		}
	}	
EOT;
			file_put_contents(APP_PATH."controllers/indexaction.class.php",$str);
		}
	}
	
	
	
	
	
	
	