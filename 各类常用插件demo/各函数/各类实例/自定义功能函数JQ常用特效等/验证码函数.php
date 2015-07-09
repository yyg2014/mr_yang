<?php
	function yzm($type = 2,$length = 4,$width = 100,$height = 30){
		
		//3.完成验证码的功能
		//六脉神贱 开始绘画验证码的图片
		//1.创建画布
		$img = imagecreatetruecolor($width,$height);
		
		//2.分配颜色
		function sys($img){
			return imagecolorallocate($img,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120));
		}
		
		$qys = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
		
		//3.开始绘画
		//1.先来填充矩形画布为浅颜色
		imagefilledrectangle($img,0,0,$width,$height,$qys);
		
		//2.开始准备随机的字符串
		switch($type){
			case 0:
				//纯数字 随机产生4个纯数字
				$str = implode("",array_rand(range(0,9),$length));//array(0=>0,1=>1,2,3,4,..9)
				break;
				
			case 1:
				//纯字母
				$str = join("",array_rand(array_flip(array_merge(range('a','z'),range('A','Z'))),$length));//array('a'=>0...'z'=>25,'A'=>26)
				break;
				
			case 2:
				//数字和字母
				$str = join("",array_rand(array_flip(array_merge(range(0,9),range('a','z'),range('A','Z'))),$length));//array(0...9,10=>'a'...'37'=>A)
				break;
		}
		
		//3.将字符串写入
		for($i=0;$i<$length;$i++){
			imagettftext($img,20,mt_rand(-30,30),$i*($width/$length),mt_rand(25,$height-15),sys($img),'./MSYHBD.TTF',$str[$i]);
		}
		
		//加入干扰素
		//加一些点
		for($i=1;$i<=100;$i++){
			imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),sys($img));
		}
		//加一些线
		for($i=1;$i<=5;$i++){
			imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),sys($img));
		}
		//4.通知浏览器以图像的形式输出
		header("content-type:image/png");
		
		//5.输出图像
		imagepng($img);
		
		//6.销毁资源
		imagedestroy($img);
		
		//将来要将$str写入到session当中
		return $str;
	
	}
	