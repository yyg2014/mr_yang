<?php
	include "./header.php";
?>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<form action="doadd.php" method="post">
	用户名:<input type="text" name="username" /><br />
	密码:<input type="password" name="password" /><br />
	确认密码:<input type="password" name="repass" /><br />
	年龄:<input type="text" name="age" /><br />
	<input type="submit" value="注册" />
	<input type="reset" value="重新填写" />
</form>