<?php
$num = $_GET["num"];
$page = $_GET["page"];
$data = array();
if($page < 11){
	for($i=0;$i<$num;$i++)
	{
		$pNum=rand(1,44);
		$data[$i]["img"] = "images/P".$pNum.".jpg";
		$data[$i]["title"] = "时间：".date("Y-m-d H:i:s")."<br />".($i+1)."、WindsWaterFlow(第".$page."页)";
		$data[$i]["href"] = "http://www.baidu.com"; 
	}
}
echo json_encode($data);

?>