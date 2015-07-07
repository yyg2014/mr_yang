<?php
	//获取一张图片的宽和高，还有资源
	function getinfo($filename){
		//我们可以使用getimagesize函数获取图像的宽高和mime类型
		$res = getimagesize($filename);
		$width = $res[0];
		$height = $res[1];
		//根据mime类型，使用对应的函数创建资源
		switch($res['mime']){
			case 'image/jpeg':
				$resource = imagecreatefromjpeg($filename);
				break;
			case 'image/gif':
				$resource = imagecreatefromgif($filename);
				break;
			case 'image/png':
				$resource = imagecreatefrompng($filename);
				break;
			case 'image/wbmp':
			case 'image/bmp':
				$resource = imagecreatefromwbmp($filename);
				break;
		}
		//将宽高和资源都返回
		return array('width'=>$width,'height'=>$height,'res'=>$resource);
	}

	
	function suolue($filename,$d_width=300,$d_height=300,$pre){

		//1.需要计算图片的比例（宽和高）
		$info = getinfo($filename);
		
		$width = $info['width'];
		$height = $info['height'];
		
		$source = $info['res'];
		
		if($width>$height){
			$bl = $height/$width;
			//计算要缩减成的高度
			$d_height = $d_width*$bl;
		}else{
			$bl = $width/$height;
			//计算要缩减的宽度
			$d_width = $d_height*$bl;
		}
		
		//2.获取图像的资源
		$dst = imagecreatetruecolor($d_width,$d_height);
		
		//3.进行调整大小
		imagecopyresampled($dst,$source,0,0,0,0,$d_width,$d_height,$width,$height);
		
		//4.保存缩略以后的图片
		//随机生成文件名
		$name = md5(rand().time()).".png";
		
		imagepng($dst,$pre.$name);
		
		//5.销毁资源
		imagedestroy($dst);
		imagedestroy($source);
	
	}
	
	suolue("./images/1.jpg",500,500,"big_");
	suolue("./images/1.jpg",300,300,'middle_');
	suolue("./images/1.jpg",150,150,"small_");

	
	
	