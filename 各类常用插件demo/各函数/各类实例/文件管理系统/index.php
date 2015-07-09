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
			<a href="./adddir.php?dirname=<?php echo $des?>">创建目录</a>
			<a href="./addfile.php?dirname=<?php echo $des?>">创建文件</a>
			<hr />
			<table border='0' width='700'>
				<tr>
					<th>文件名称</th>
					<th>文件类型</th>
					<th>文件大小</th>
					<th>修改时间</th>
					<th>操作</th>
				</tr>
				<tr>
					<td colspan="5"><hr /></td>
				</tr>
				<?php
				//加载获取文件大小的函数
				include "./getsize.func.php";
				
				//加载统计目录大小的函数
				include "./dirsize.func.php";
				
				//定义时区
				date_default_timezone_set("PRC");
				
				//1.打开目录
				$dir = opendir($des);
				
				//2.读取目录
				$i = 1;
				while(false!==($f=readdir($dir))){
					//3.处理目录
					$d = rtrim($des,"/")."/".$f;
					if($i%2==1){
						echo "<tr>";
					}else{
						echo "<tr bgcolor='#cccccc'>";	
					}
					echo "<td>".iconv("gbk","utf-8",$f)."</td>";
					echo "<td>".filetype($d)."</td>";
					echo "<td>".(filetype($d)=='file'?getsize(filesize($d)):getsize(dirsize($d)))."</td>";
					echo "<td>".date("Y-m-d H:i:s",filemtime($d))."</td>";
					echo "<td>".(filetype($d)=='dir'?'<a href="?dirname='.$d.'">进入目录</a>':'修改 删除')."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan=\"5\"><hr /></td>";
					echo "</tr>";
					$i++;
				}
			
				//4.关闭目录
				?>
			</table>
		</center>
	</body>
</html>