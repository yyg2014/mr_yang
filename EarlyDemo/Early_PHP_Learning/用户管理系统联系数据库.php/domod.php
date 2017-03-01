<?php
	header("content-type:text/html;charset=utf-8");
	
	//加载数据库配置文件
	include "./config.php";
	
	//1.接收数据
	$username = $_POST['username'];
	$age = $_POST['age'];
	$id = $_POST['id'];
	
	//天龙八部
	//1.连接数据库
	$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);
	
	//2.判断错误
	if(mysql_errno()){
		exit(mysql_error());
	}
	
	//3.设置字符集
	mysql_set_charset(DB_CHARSET);
	
	//4.选择数据库
	mysql_select_db(DB_NAME);
	
	//5.准备sql语句
	$sql = "update ".DB_PREFIX."user set username='$username',age='$age' where id=".$id;
	
	//6.发送sql语句
	$result = mysql_query($sql);
	
	//7.处理结果集
	if($result && mysql_affected_rows()){
		echo "<script>alert('修改成功！')</script>";
		$a = "show.php";
	}else{
		echo "<script>alert('修改失败！')</script>";
		$a = "mod.php?id=".$id;
	}
	
	//8.关闭数据库连接
	mysql_close($link);
		
	echo "<script>window.location.href='$a'</script>";
		
		
		
		
		