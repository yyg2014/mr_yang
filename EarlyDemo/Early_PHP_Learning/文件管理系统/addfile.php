<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>PSD1311文件管理系统</title>
	</head>
	<body>
		<center>
			<?php
				$des = empty($_GET['dirname'])?"F:/wamp/www/psd1311/20140103-file2/test":$_GET['dirname'];
			?>
			<h2>PSD1311文件管理系统</h2>
			<font size="7" color="red">当前所在目录：<?php echo $des ?></font>
			<hr />
			<a href="?dirname=<?php echo dirname($des)?>">上一级目录</a>
			<a href="./adddir.php?dirname<?php echo dirname($des)?>">创建目录</a>
			<a href="">创建文件</a>
			<hr />
			<form action='do_addfile.php' method="post">
				<input type="hidden" name="path" value="<?php echo $des?>" />
				请输入文件名称：<input type="text" name="fname" />
				<input type="submit" />
			</form>
		</center>
	</body>
</html>