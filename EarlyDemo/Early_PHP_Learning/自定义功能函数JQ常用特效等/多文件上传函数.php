<?php
	/*
	 * 功能：文件上传函数
	 * @param string &$info 上传错误信息
	 * @param string $name  上传表单元素的名称
	 * @param array $allow_mime 允许的上传文件的mime类型
	 * @param array $allow_ext 允许上传的文件的扩展名
	 * @param numberic $allow_size 允许的文件大小
	 * @return mixed 返回文件详细信息或者false
	 * 
	 */
	function upload(&$info,$m=false,$k=0,$name='pic',$allow_mime=array('image/jpeg','image/gif','image/png'),$allow_ext=array('jpg','gif','png'),$allow_size=3000000){
		
		if(!$m){
		//1.观察数组
			$upload = $_FILES[$name];//$_FILES['pic']
		}else{
			$upload = $_FILES[$name][$k];
		}
		
		//2.判断错误号
		if($upload['error']>0){
			switch($upload['error']){
				case 1:
					$info = 'upload_max_filesize';
					return false;
				case 2:
					$info = 'MAX_FILE_SIZE';
					return false;
				case 3:
					$info = '部分文件被上传';
					return false;
				case 4:
					$info = '没有文件被上传';
					return false;
				case 6:
					$info = '找不到临时文件夹';
					return false;
				case 7:
					$info = '写入临时文件夹失败！';
					return false;
			}
		}
		
		//3.判断文件是否是post上传
		if(!is_uploaded_file($upload['tmp_name'])){
			$info = '非法上传！';
			return false;
		}
		
		//4.判断文件mime类型
		
		if(!in_array($upload['type'],$allow_mime)){
			$info = '文件的mime类型不被允许';
			return false;
		}
		
		//5.判断文件的扩展名
		
		$ext = pathinfo($upload['name'],PATHINFO_EXTENSION);
		if(!in_array($ext,$allow_ext)){
			$info = '不被允许的扩展名';
			return false;
		}
		
		//6.判断文件大小
		
		if($upload['size']>$allow_size){
			$info = '文件超出指定大小！';
			return false;
		}
		
		//7.生成新的文件名，创建上传目录
		$new_name = uniqid().".".$ext;
		$dir = "./uploads/";
		
		if(!file_exists($dir)){
			mkdir($dir,0755,true);
		}
		
		//8.移动临时文件
		if(move_uploaded_file($upload['tmp_name'],rtrim($dir,"/")."/".$new_name)){
			$info = "恭喜您，文件上传成功！";
			
			//9.将上传的文件详细信息返回
			return array('sname'=>$upload['name'],'ext'=>$ext,'mime'=>$upload['type'],'new_name'=>$new_name,'size'=>$upload['size']);
			
		}
	}