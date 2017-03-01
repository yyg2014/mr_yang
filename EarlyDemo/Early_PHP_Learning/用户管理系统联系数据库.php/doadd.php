<?php
	//加载数据库配置文件
	include "./config.php";
	header("content-type:text/html;charset=utf-8");
	//1.接收数据
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repass = $_POST['repass'];
	$age = $_POST['age'];
	
	//2.判断两次密码输入是否一致
	if($password!=$repass){
		//exit("两次密码输入不一致！");
		echo "<script>alert('对不起，亲，您输入的两次密码不一致，请重新输入！')</script>";
		echo "<script>window.location.href='add.php'</script>";
		exit();
	}
	
	//3.将密码进行md5加密
	$password = md5($password);
	
	//4.获取注册时间，注册ip
	$rtime = $_SERVER['REQUEST_TIME'];
	$rip = ip2long($_SERVER['REMOTE_ADDR']);
	
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
	$sql = "insert into ".DB_PREFIX."user(username,password,age,rtime,rip) values('$username','$password','$age','$rtime','$rip')";
	
	//6.发送sql语句
	$result = mysql_query($sql);
	
	//7.处理结果
	if($result){
		echo "<script>alert('恭喜您，注册成功！您的ID号为：".mysql_insert_id()."')</script>";
		echo "<script>window.location.href='show.php'</script>";
	}else{
		echo "<script>alert(\"对不起，注册失败了！".mysql_error()."\")</script>";
		echo "<script>window.location.href='add.php'</script>";
	}
	
	//8.关闭数据库连接
	mysql_close($link);
	
	
	
	