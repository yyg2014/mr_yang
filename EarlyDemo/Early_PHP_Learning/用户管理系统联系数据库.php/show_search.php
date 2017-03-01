<?php
	//加载公共头文件
	include "./header.php";
	//加载数据库配置文件
	include "./config.php";
	
	//输出用户的表格
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
	
	
	//============分页处理开始  （分页七伤拳）===========//
	
	//$page_size---3
	//1------0,3    $page_num---(1-1)*$page_size   0
	//2------3,3    $page_num---2   3
	//3------6,3    $page_num---3   6
	//4------9,3    $page_num---4   9
	//limit ($page_num-1)*$page_size,$page_size
	
	//判断是否进行了搜索
	//如果进行了搜索，$_GET['key']不为空，组装where子句
	if(!empty($_GET['key'])){
		$where = " where username like '%".$_GET['key']."%' ";
		$where_link = "&key=".$_GET['key'];
	}else{
		$where = "";
		$where_link = "";
	}
	
	//开始分页：
	
	//1.定义页大小
	$page_size = empty($_GET['size'])?3:$_GET['size'];
	
	if(!empty($_GET['size'])){
		$size_link = "&size=".$_GET['size'];
	}
	
	//2.获取当前页码
	$page_num = empty($_GET['page'])?1:$_GET['page'];
	
	//3.获取记录总数
	$result = mysql_query("select count(*) as c from shop_user".$where);
	$count = mysql_fetch_assoc($result);
	$c = (int)$count['c'];

	//4.获取总页数
	$page_count = ceil($c/$page_size);
	
	//5.防止越界
	if($page_num<1){
		$page_num = 1;
	}
	
	if($page_num>$page_count){
		$page_num = $page_count;
	}
	
	//6.组装limit
	$limit = " limit ".($page_num-1)*$page_size.",".$page_size;
	
	//==================分页处理结束===================//
	
	//5.准备sql语句
	$sql = "select * from ".DB_PREFIX."user ".$where.$limit;
	
	//6.发送sql语句
	$result = mysql_query($sql);
	
	//7.处理结果集
	if($result && mysql_num_rows($result)){
		echo "<form>";
		echo "搜索一下，你就知道：";
		echo "<input type='text' name='key' size='30' />";
		echo "<input type='submit' value='搜索' />";
		echo "</form>";
		
		echo "<table border='1' width='500'>";
		echo "<tr>";
		echo "<th>ID号</th>";
		echo "<th>用户名</th>";
		echo "<th>年龄</th>";
		echo "<th>注册时间</th>";
		echo "<th>注册IP</th>";
		echo "<th>操作</th>";
		echo "</tr>";
		while($user = mysql_fetch_assoc($result)){
			echo "<tr align='center'>";
			echo "<td>".$user['id']."</td>";
			echo "<td>".$user['username']."</td>";
			echo "<td>".$user['age']."</td>";
			echo "<td>".date("Y-m-d H:i:s",$user['rtime'])."</td>";
			echo "<td>".long2ip($user['rip'])."</td>";
			//echo "<td><a href='mod.php?id=".$user['id']."'>修改</a> <a href='del.php?id=".$user['id']."'>删除</a></td>";
			echo "<td><a href='mod.php?id=".$user['id']."'>修改</a> <a href='javascript:del(".$user['id'].");'>删除</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	echo "<br />";
	//7.添加超链接
	echo "<a href='?page=1".$where_link.$size_link."'>首页</a>
		  <a href='?page=".($page_num-1).$where_link.$size_link."'>上一页</a>
		  <a href='?page=".($page_num+1).$where_link.$size_link."'>下一页</a>
		  <a href='?page=".$page_count.$where_link.$size_link."'>尾页</a>
		 本页 ".(($page_num==$page_count&&$c%$page_size!=0)?($c%$page_size):$page_size)." 条
		  共 ".$c." 条
		 共  ".$page_count." 页";
	echo "<br />";
	echo "<br />";
	echo "<form>";
	echo "每页显示";
	echo "<select name='size'>";
	echo "<option value='2'>2</option>";
	echo "<option value='3'>3</option>";
	echo "<option value='4'>4</option>";
	echo "</select>";
	echo "条";
	echo "<input type='submit' value='确定'>";
	echo "</form>";
	
	echo "</center>";
	//8.释放结果集资源，关闭数据库连接
	mysql_free_result($result);
	mysql_close($link);
	
?>
	<script>
		function del(id){
			//如果点击了确定，confirm返回真吗，否则返回假
			if(confirm("您手抖了吗，您是真的要确认删除吗？您真的想好了吗？")){
				window.location.href='del.php?id='+id;
			}else{
				alert('您真的不需要删除吗？');
			}
		}
	</script>