<?php
	header("content-type:text/html;charset=utf-8");
	//var_dump($_POST);
	//1.获取参数
	$name = $_POST['name'];
	$pid = $_POST['pid'];
	
	//2.获取上级分类的path路径
	mysql_connect("localhost","root","lixiaoshuai");
	
	mysql_set_charset("utf8");
	
	mysql_select_db("nolimit");
	
	$sql = "select path from cate where id=".$pid;
	
	$res = mysql_query($sql);
	
	$path = mysql_fetch_assoc($res);
	
	mysql_free_result($res);
	
	$path = $path['path']."-".$pid;
	
	$sql = "insert into cate(name,pid,path) values('$name','$pid','$path')";
	
	$res = mysql_query($sql);
	
	if($res && mysql_insert_id()){
		mysql_close();
		echo "<script>alert('添加成功！')</script>";
		echo "<script>window.location.href='1.php'</script>";
		exit;
	}
	
	
	
	
	