<?php
	/*
	 * 用来访问数据库，发送sql语句，获取发送的结果
	 * @param string $sql 传递进来要执行的sql语句
	 * return mixed 错误信息，自增id，受影响行数，二维数组
	 */
	function conn($sql){
		
		//1.连接数据库
		$link = @mysql_connect(DB_HOST,DB_USER,DB_PASS);
		
		//2.判断错误
		if(mysql_errno()){
			return false;
		}
		
		//3.设置字符集
		mysql_set_charset(DB_CHARSET);
		
		//4.选择数据库
		mysql_select_db(DB_NAME);
		
		//5.获取sql语句
		
		//6.发送sql语句
		$result = mysql_query($sql);
		
		//如果发送失败
		if(!result){
			return false;
		}
		
		//7.处理结果
		//判断sql语句是什么类型
		//insert  mysql_insert_id()
		//update  delete  mysql_affected_rows()
		//select  array(array('id'=>1,'username'=>'zhangsan'),array(.....))
		$mod = substr($sql,0,6);
		switch($mod){
			case 'insert':
				$res = mysql_insert_id();
				break;
			case 'delete':
			case 'update':
				$res = mysql_affected_rows();
				break;
			case 'select':
				while($user=mysql_fetch_assoc($result)){
					$res[] = $user;
				}
				//释放结果集资源
				mysql_free_result($result);
				break;
			default:
				$res = $result;
		}
		
		//8.关闭数据库连接，释放结果集资源
		mysql_close($link);
		
		//9.返回结果
		return $res;
	}