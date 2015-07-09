<?php
	header("content-type:text/html;charset=utf-8");
	/**
	 * 类名称：验证码类
	 * 作用：输出验证码
	 * 作者：PSD1311
	 * 时间：2014年2月10日
	 * 版本：1.0
	 * 
	 */
	class vcode{
		
		private $width;						//验证码图片的宽度
		private $height;					//验证码图片的高度
		private $type;						//验证码的类型
		private $length;					//验证码的长度
		private $img=null;					//产生的画布资源
		private $str="";					//产生的随机字符串
		private $fontSize=20;				//验证码的字体大小
		private $errInfo;					//错误信息
		private $fontFam='./GOTHICBI.TTF';	//验证码的字体族科
		private $disNum=100;				//干扰素的数量
		private $allowSet = array('width','height','type','length','fontSize','fontFam','disNum');//允许设置的成员属性的名称
		
		/**
		 * 名称：构造方法
		 * 作用：初始化成员属性
		 * @param  int $width 验证码图片的宽度
		 * @param  int $height 验证码图片的高度
		 * @param  int $type  验证码的类型
		 * @param  int $length 验证码字符串的长度
		 * 
		 */
		public function __construct($width = 100,$height = 50,$type = 1,$length = 4){
			$this->width = $width;
			$this->height = $height;
			$this->type = $type;
			$this->length = $length;
		}
		
		/**
		 * 名称：set方法
		 * 作用：自动设置私有成员属性
		 * @param  string $proName 要设置的成员属性的名称
		 * @param  mixed $proVal 要设置的成员属性的值
		 * 
		 */
		public function __set($proName,$proVal){
			if($proName=='fontSize'){
				if($proVal<5||$proVal>40){
					//$this->fontSize = 20;
					$this->errInfo = "对不起，您的数据有误！";
				}else{
					$this->fontSize = $proVal;
				}
			}
			if($proName=='fontFam'){
				if(!file_exists($proVal)){
					$this->errInfo = "对不起，您要设置的字体文件：".$proVal."不存在，无法设置！";
				}else{
					$this->fontFam = $proVal;
				}
			}
			if($proName=='disNum'){
				if($proVal<0||$proVal>100){
					$this->errInfo = "对不起，您的干扰素设置的忒多了！为了不影响您的使用，请设置0-100的值";
				}else{
					$this->disNum = $proVal;
				}
			}
		}
		
		/**
		 * 名称：set方法
		 * 作用：手动设置私有成员属性
		 * @param  string $proName 要设置的成员属性的名称
		 * @param  mixed $proVal 要设置的成员属性的值
		 * @return object $this 返回本对象，便于链式操作
		 * 
		 */
		
		public function set($proName,$proVal){
			//判断一个成员属性是否存在于对象当中
			if(property_exists(__CLASS__,$proName)){
				
				if(in_array($proName,$this->allowSet)){
				
					$this->$proName = $proVal;
				
				}else{
					$this->errInfo = "对不起，您没有设置该属性的权限！";
				}
			}else{
				$this->errInfo = "对不起，您要设置的属性不存在！";
			}
			
			return $this;
		}
		
		//1.创建画布
		private function creatHb(){
			$this->img = imagecreatetruecolor($this->width,$this->height);
		}
		
		//2.分配颜色
		private function qys(){
			return imagecolorallocate($this->img,mt_rand(130,255),mt_rand(130,255),mt_rand(130,255));
		}
		
		private function sys(){
			return imagecolorallocate($this->img,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
		}
		
		//3.准备随机字符串
		private function getString(){
			switch($this->type){
				case 1:
					$this->str = join(array_rand(range(0,9),$this->length));
					return;
				case 2:
					$this->str = join(array_rand(array_flip(array_merge(range(0,9),range('a','z'))),$this->length));
					return;
				case 3:
					$this->str = join(array_rand(array_flip(array_merge(range(0,9),range('a','z'),range('A','Z'))),$this->length));
					return;
			}
		}
		
		//4.先把画布填充，将字符依次写入到画布当中
		private function writeStr(){
			imagefilledrectangle($this->img,0,0,$this->width,$this->height,$this->qys());
			
			for($i=0;$i<$this->length;$i++){
				imagettftext($this->img,$this->fontSize,mt_rand(-30,30),($this->width/$this->length)*$i,mt_rand(20,$this->height-10),$this->sys(),$this->fontFam,$this->str[$i]);
			}
		}
		
		//5.添加干扰素
		private function setDis(){
			for($i=0;$i<$this->disNum;$i++){
				imagesetpixel($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),$this->sys());
			}
		}
		
		public function getCode(){
			
			//创建画布
			$this->creatHb();
			
			if(!empty($this->errInfo)){
				echo $this->errInfo;
				return false;
			}
			
			//准备随机字符串
			$this->getString();
			
			//先把画布填充，将字符依次写入到画布当中
			$this->writeStr();
			
			//设置干扰素
			$this->setDis();
			
			//6.通知浏览器以图片的形式输出
			header("content-type:image/png");
			
			//7.输出验证码
			imagepng($this->img);
			
			return $this->str;
		
		}
		
		public function __destruct(){
		
			//8.销毁资源
			imagedestroy($this->img);
		
		}
	}
	
	$vcode = new vcode();
	
	$vcode->set('fontSize',25)->set('fontFam','./STCAIYUN.TTF')->set('width',200)->getcode();
	
	//$vcode->fontSize = 35;
	
	//$vcode->fontFam = './U.TTF';
	
	//$vcode->disNum = 100;
	
	//$vcode->getCode();
	
	
	
	
	
	
	