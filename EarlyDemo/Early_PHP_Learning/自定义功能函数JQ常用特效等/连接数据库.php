<?php
	
	function conn($sql){
		//1.判断sql语句的类型
		$mod = substr($sql,0,6);
		
		//2.连接数据库
		$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);
		
		//3.判断错误
		if(mysql_errno()){
			return false;
		}
		
		//4.设置字符集
		mysql_set_charset(DB_CHARSET);
		
		//5.选择数据库
		mysql_select_db(DB_NAME);
		
		//6.准备sql语句
		
		//7.发送sql语句
		$res = mysql_query($sql);
		
		if($res){
			//8.处理结果
			switch($mod){
				case 'insert':
					$result = mysql_insert_id();
					break;
				case 'update':
				case 'delete':
					$result = mysql_affected_rows();
					break;
				case 'select':
					while($row=mysql_fetch_assoc($res)){
						$result[] = $row;
					}
					mysql_free_result($res);
			}
		}else{
			$result = false;
		}
		
		//9.关闭数据库连接
		mysql_close($link);
		
		//10.返回结果
		return $result;
	}
	
	
	
	
	