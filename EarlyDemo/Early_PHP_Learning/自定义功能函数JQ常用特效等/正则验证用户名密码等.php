<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<form method="post">
	用户名：<input type="text" name="username" />数字字母下划线组成<br />
	密码:<input type="password" name="password" />8-16位大小写字母、数字组成<br />
	email:<input type="text" name="email" />输入正确的E-mail地址<br />
	<input type="submit" name="sub" /><input type="reset" />
</form>

<?php
	/*echo "<pre>";
	var_dump($_POST);
	echo "</pre>";*/
	//1.判断页面是否已经提交
	if(isset($_POST['sub'])){
		//2.接收参数
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];	
		
		//3.验证数据
		//a.验证用户名 数字字母下划线
		$pattern = "/^\w+$/i";
		if(!preg_match($pattern,$username)){
			echo "对不起，您的用户名不合符要求！";
			exit;	
		}
		
		//b.验证密码 8-16数字大小写字母
		$pattern = "/^[0-9a-z]{8,16}$/i";
		if(!preg_match($pattern,$password)){
			echo "您的密码不符合要求！";	
			exit;
		}
		
		//c.验证邮箱格式
		//86267659@qq.com
		//li-jie@li-jie.me
		//asda_sd123@163.com.cn
		//dsadasd@263.com
		//123123@baidu.com
		
		$pattern = "/^[\w-]+@[\w-]+\.[a-z]+(\.[a-z]+)?$/i";
		
		if(!preg_match($pattern,$email)){
			echo "对不起，您输入的邮箱格式不正确！";
			exit;
		}
		
		
		//3.插入数据
		echo "注册成功！";
		
	}	
		
		
		
		
		




