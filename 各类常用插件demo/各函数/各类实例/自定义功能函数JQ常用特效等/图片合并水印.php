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


	function water($dst,$water,$pos=8,$alp=50){
		//1.获取$dst和$water的大小
		$dst_info = getinfo($dst);
		$water_info = getinfo($water);
		
		$dst_width = $dst_info['width'];
		$dst_height = $dst_info['height'];
		
		$water_width = $water_info['width'];
		$water_height = $water_info['height'];
		
		//2.创建$dst和$water的资源
		$dst_res = $dst_info['res'];
		$water_res = $water_info['res'];
		
		//3.确定水印图片的位置
		switch($pos){
			case 0:
				$x = 0;
				$y = 0;
				break;
			case 1:
				$x = ($dst_width/2)-($water_width/2);
				$y = 0;
				break;
			case 2:
				$x = $dst_width-$water_width;
				$y = 0;
				break;
			case 3:
				$x = 0;
				$y = $dst_height/2-$water_height/2;
				break;
			case 4:
				$x = ($dst_width/2)-($water_width/2);
				$y = $dst_height/2-$water_height/2;
				break;
			case 5:
				$x = $dst_width-$water_width;
				$y = $dst_height/2-$water_height/2;
				break;
			case 6:
				$x = 0;
				$y = $dst_height-$water_height;
				break;
			case 7:
				$x = ($dst_width/2)-($water_width/2);
				$y = $dst_height-$water_height;
				break;
			case 8:
				$x = $dst_width-$water_width;
				$y = $dst_height-$water_height;
				break;
		}
		
		//4.合并图片
		imagecopymerge($dst_res,$water_res,$x,$y,0,0,$water_width,$water_height,$alp);
		
		//5.通知浏览器以图片的形式显示
		header("content-type:image/png");
		
		//6.输出图片
		imagepng($dst_res);
		
		//7.销毁资源
		imagedestroy($dst_res);
		imagedestroy($water_res);
	}
	
	water("./images/1.jpg","./images/baidu.gif",2,50);
	
	
	
	