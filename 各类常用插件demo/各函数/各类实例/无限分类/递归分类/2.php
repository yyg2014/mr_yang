<?php
	
	function getChildren($id=0){
		$data = array();
	
		//1.获取当前类下的子类
		mysql_connect("localhost","root","lixiaoshuai");
		
		mysql_set_charset("utf8");
		
		mysql_select_db("nolimit");
		
		$sql = "select * from cate2 where pid=".$id;
		
		$res = mysql_query($sql);
		
		if($res && mysql_num_rows($res)){
		
			//2.判断这个子类下有没有子类
			while($row=mysql_fetch_assoc($res)){
				$data[] = $row;
			}
			
			foreach($data as &$cate){
				$cate['children'] = getChildren($cate['id']);
			}

		}

		//4.返回整个分类树
		return $data;
	}
	
	$tree = getChildren(0);
	
	$str = "<?php\n";
	
	$str .= "return ";
	
	$str .= var_export($tree,true);
	
	$str .= ";";
	
	file_put_contents("./cates.php",$str);
	
	
	
	
	
	
	
	