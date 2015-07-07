<?php
	//用户档案表，其中包括用户的姓名，年龄以及性别
	//将用户的信息输出到一个表格当中
	//1.设计一个数组，将这四个用户存入到数组当中
	/*array(
		"xingming"=>array(
				"zhangsan",
				"lisi",
				"wangwu"
			),
		"xingbie"=>array(
				"nan",
				"nv",
				"nan"
			)
	)*/
	
	/*array(
		"zhangsan"=>array(
				"age"=>18,
				"sex"=>"nan"
			),
		"lisi"=>array(),
		"zhangsan"=>array()
	)*/
	
	
	/*array(
		0=>array("username"=>"zhangsan","age"=>18,"sex"=>"nan"),
		1=>array(.....)
	)*/
	
	$users[] = array("username"=>"zhangsan","age"=>18,"sex"=>"nan");
	$users[] = array("username"=>"lisi","age"=>21,"sex"=>"nan");
	$users[] = array("username"=>"wangwu","age"=>32,"sex"=>"nv");
	$users[] = array("username"=>"zhaoliu","age"=>20,"sex"=>"nv");
	$users[] = array("username"=>"tianqi","age"=>30,"sex"=>"nan");
	$users[] = array("username"=>"zhaoba","age"=>32,"sex"=>"nv");
	
	
	
	echo "<table border='1' width='700'>";
	echo "<tr>";
	echo "<th>username</th>";
	echo "<th>sex</th>";
	echo "<th>age</th>";
	echo "</tr>";
	//$val就是用户的数组
	foreach($users as $val){
		echo "<tr>";
		echo "<td>{$val['username']}</td>";
		echo "<td>{$val['sex']}</td>";
		echo "<td>{$val['age']}</td>";
		echo "</tr>";
	}
	
	echo "</table>";
	
	echo "<pre>";
	var_dump($users);
	echo "</pre>";
	
	