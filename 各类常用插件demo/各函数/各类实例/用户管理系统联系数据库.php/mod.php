<?php
	//加载公共头文件
	include "./header.php";
	
	//加载数据库配置文件
	include "./config.php";
	
	//1.接受数据
	$id = $_GET['id'];
	
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
	$sql = "select username,age from ".DB_PREFIX."user where id=".$id;
	
	//6.发送sql语句
	$result = mysql_query($sql);
	
	//7.处理结果集
	if($result && mysql_num_rows($result)){
		$user = mysql_fetch_assoc($result);
	}
	
	//8.释放结果集资源，关闭数据库连接
	mysql_free_result($result);
	mysql_close($link);
?>
	<form action="domod.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id ?>" />
		用户名:<input type="text" name="username" value="<?php echo $user['username']?>" /><br />
		年龄:<input type="text" name="age" value="<?php echo $user['age']?>" /><br />
		<input type="submit" value="修改" />
		<input type="reset" value="重新填写" />
	</form>

	