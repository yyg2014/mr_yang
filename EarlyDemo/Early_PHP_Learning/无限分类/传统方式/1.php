<?php
	header("content-type:text/html;charset=utf-8");
	//1.连接数据库
	mysql_connect("localhost","root","lixiaoshuai");
	
	//2.判断错误
	if(mysql_errno()){
		exit(mysql_error());
	}
	
	//3.设置字符集
	mysql_set_charset("utf8");
	
	//4.选择数据库
	mysql_select_db("nolimit");
	
	//5.准备sql语句
	$sql = "select * from cate order by concat(path,'-',id)";
	
	//6.发送sql语句
	$res = mysql_query($sql);
	
	//7.处理结果
	if($res && mysql_num_rows($res)){
		while($row=mysql_fetch_assoc($res)){
			$data[] = $row;
		}
	}
	
	//8.释放结果集，关闭数据库连接
	mysql_free_result($res);
	mysql_close();
	
	/*echo "<pre>";
	var_dump($data);
	echo "</pre>";*/
	
	echo "<form action='doadd.php' method='post'>";
	
	
	echo "请选择上级分类：<select name='pid'>";
	echo "<option value='0'>添加顶级分类</option>";
	foreach($data as $cate){
	
		$indent = "";
		
		//判断级别
		$deep = count(explode("-",$cate['path']));
		
		for($i=1;$i<=$deep*2;$i++){
			$indent .= "-";
		}
	
		echo "<option value='".$cate['id']."'>|".$indent.$cate['name']."</option>";
	}
	echo "</select><br />";
	
	echo "分类名称：<input type='text' name='name' /><br />";
	
	echo "<input type='submit' />";
	
	echo "</form>";
	
	
	
	