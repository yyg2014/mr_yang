<?php
	//加载函数文件
	include "文件上传函数";
	
	//组装数组
	foreach($_FILES['pic'] as $key=>$val){
		foreach($val as $k=>$v){
			$new_arr[$k][$key] = $v;
		}
	}
	
	$_FILES['pic'] = $new_arr;
	
	//遍历，循环调用该上传函数
	foreach($_FILES['pic'] as $key=>$val){
		upload($info,true,$key);
	}
	
	/*
	 array(
	 	0=>array(
	 			'name'=>'1.png'
	 			'type'=>image/png
	 			'tmp_name'
	 			'error'
	 			'size'
	 		),
	 	1=>array(
	 			'name'=>
	 			'type'=>
	 			'tmp_name'
	 			'error'
	 			'size'
	 	)
	 )
	 
	 
 
	 */