<?php
	header("content-type:text/html;charset=utf-8");
	
	//加载数据库配置文件
	include "./config.php";
	
	//1.接收数据
	$id = $_GET['id'];
	
	//天龙八部
	//1.连接数据库
	$link = @mysql_connect(DB_HOST,DB_USER,DB_PASS);
	
	//2.判断错误
	if(mysql_errno()){
		exit(mysql_error());
	}
	
	//3.设置字符集
	mysql_set_charset(DB_CHARSET);
	
	//4.选择数据库
	mysql_select_db(DB_NAME);
	
	//5.准备sql语句
	$sql = "delete from ".DB_PREFIX."user where id=".$id;
	
	//6.发送sql语句
	$result = mysql_query($sql);
	
	//7.处理结果
	if($result && mysql_affected_rows()){
		echo "<script>alert('删除成功！')</script>";
	}else{
		echo "<script>alert('删除失败！')</script>";
	}
	
	//8.关闭数据库连接
	mysql_close($link);
	echo "<script>window.location.href='show.php'</script>";
	
	
	
	
	