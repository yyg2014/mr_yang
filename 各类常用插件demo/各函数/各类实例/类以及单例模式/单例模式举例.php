<?php
	header("content-type:text/html;charset=utf-8");
	class Person{
		public $name;
		public $age;
		public $sex;
		
		//静态成员属性，用来保存实例化好的对象
		private static $obj=null;
		
		private function __construct($name="zhangsan",$age=18,$sex="nan"){
			$this->name = $name;
			$this->age = $age;
			$this->sex = $sex;
		}
		
		public static function getObj($name="zhangsan",$age=18,$sex="nan"){
			//当第一次通过该方法进行对象的实例化，会将类实例化成的对象保存到静态成员属性当中
			//在第二次乃至后面的访问，会直接从这个静态成员属性当中获取，不会再实例化
			//从而防止类实例化多次
			if(is_null(self::$obj)){
				self::$obj = new self($name,$age,$sex);
			}
			return self::$obj;
		}
		
		public function say(){
			echo "我的姓名：".$this->name."<br />";
			echo "我的年龄：".$this->age."<br />";
			echo "我的性别：".$this->sex."<br />";
			echo "<hr />";
		}
	}
	
	/*$p1 = new Person("zhangsan",20,"nan");
	$p1->say();
	
	$p2 = new Person("lisi",18,"nv");
	$p2->say();
	
	$p3 = new Person("wangwu",32,"nan");
	$p3->say();*/
	
	//1.想办法让类不能通过new实例化
	$p1 = Person::getObj("lisi",32,"nan");
	
	var_dump($p1);
	
	$p2 = Person::getObj("zhangsan",18,"nv");
	
	var_dump($p2);
	
	
	
	
	
	
	