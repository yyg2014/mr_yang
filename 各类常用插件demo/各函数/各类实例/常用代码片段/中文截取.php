<?php
header("Content-type: text/html; charset=utf-8");  
	$tableDate=date('Y');
	echo 'info_relation_'.$tableDate.'<br/>';
		$arrArticle["recommend"]=0	;

		$arrArticle["title"]="链地址info_relatio";

		echo mb_substr_count($arrArticle["title"], "【荐】");

 
/* 
* 中文截取，支持gb2312,gbk,utf-8,big5 
* 
* @param string $str 要截取的字串 
* @param int $start 截取起始位置 
* @param int $length 截取长度 
* @param string $charset utf-8|gb2312|gbk|big5 编码 
* @param $suffix 是否加尾缀 
*/ 
 function csubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) 
{ 
if(function_exists("mb_substr")) 
{ 
if(mb_strlen($str, $charset) <= $length) return $str; 
$slice = mb_substr($str, $start, $length, $charset); 
} 
else 
{ 
$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/"; 
$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/"; 
$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/"; 
$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/"; 
preg_match_all($re[$charset], $str, $match); 
if(count($match[0]) <= $length) return $str; 
$slice = join("",array_slice($match[0], $start, $length)); 
} 
if($suffix) return $slice."…"; 
return $slice; 
} 


			echo "<pre>";
			//var_dump($match);
			echo "</pre>";