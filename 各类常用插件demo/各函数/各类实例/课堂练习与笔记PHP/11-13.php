<?php 
header("content-type:text/html;charset=utf-8");
/* $arr=array(10,20,40,70,100);


	for($a=0,$sum=0;$a<=count($arr)-1;$a++){
			$sum+=$arr[$a];
		}
	echo $sum;
数组内所有元素的和
echo array_sum($a);
______________________________________________________________________--

将数组内的所有元素倒着输出
$a=array(10,30,50,20,12,100);

echo array_reverse($a);

end($a);
do{	
	echo current($a)."<br/>";
	prev($a);
}
while(current($a));  
//echo strcasecmp(1,2); 比较结果为-1
______________________________________________________________________

  			//引用传参面试题
		Foreach($arr as $key=>$val){
			$arr[$key] = &$val;
		}
		echo "<pre>";
		var_dump($arr);
		echo "</pre>"."<br/>";
		
		$arr = array(‘a’,’b’,’c’);
		Foreach($arr as $key=>$val){
			$val = &$arr[$key];
		}
		echo "<pre>";
		var_dump($arr);
		echo "</pre>"."<br/>";
______________________________________________________________________
*/
/*

				//冒泡排序   
$a=array(10,30,50,20,100,12);
for($j=0,$cc=count($a);$j<$cc;$j++){  				//控制循环次数
	for($i=0,$c=count($a);$i<$cc-1;$i++){				//比较循环 
		if($a[$i]>$a[$i+1]){
		$d=$a[$i];
		$a[$i]=$a[$i+1];
		$a[$i+1]=$d;
		}
	}	
}
var_dump($a);
 __________________________________________________________________________
$b=array_keys($a);
echo "<pre>";
var_dump($b);
echo "</pre>";
*/
/*
 * ——————————————————————————————————————————————————————————————————————————————————
 * 			取出数组当中的 键 
$a=array(10,30,50,20,100,12);
 function arkeys($f){
    if(!is_array($f)){
	return false;
    }
	foreach($f as $key=>$val){
		$arr[]=$key;
	}
return $arr;
}
echo "<pre>";
var_dump(arkeys($a));
echo "</pre>";
————————————————————————————————————————————————————————————————————————————
       				取出数组当中所有的值
       				
function arval($q){
	if(!is_array($q)){
	return false;
}
foreach($q as $key=>$val){
  $ar[]=$val;
}
return $ar;
}
echo "<pre>";
var_dump(arval($a));
echo "</pre>";
 */
/*
————————————————————————————————————————————————————————————————————————————————————————————————
   				模仿函数  判断一个数值是否是 数组内的 值
 
 function dd($c,$b) {
	if(!is_array($b)){
	return false;
		}
	 foreach($b as $key=>$val){
	 if($val==$c){
	 return true;
	 }
	 }
	 return false;
	  }
var_dump(dd(120,$a));	  	  
	   */
/* 	  

 —————————————————————————————————————————————————————————————————————————————— 
               模仿函数功能   判断   是否是 数组的键
	function ddd($z,$array){
		if(!is_array($array)){
			return false;
		}
		foreach($array as $key=>$val){
			if($key===$z){
			return true;
			}
		}
		
		return false;
	}  
	var_dump(ddd('9',$a));	  
___________________________________________________________________________	
	  // 模仿函数   将数组的 键值呼唤互换
	  
	$a=array(10,30,50,20,100,12,'ss'=>3,'fff'=>5);
	function adidds($f){
		if(!is_array($f)){
			return false;
		}
		foreach($f as $key=>$val){
			$arr[$val]=$key;	
		}
		return $arr;
	}  

	echo "<pre>";
	var_dump($a);
	echo "</pre>"."<br/>";
	 
	echo "<pre>";
	var_dump(adidds($a));
	echo "</pre>";	  
_______________________________________________________________________________________	
	     //模仿函数功能  将    数组的倒序   关联数组保留键名 
	$a=array(10,30,50,20,100,12,'ss'=>3,'fff'=>5);
	function nake($l){
		if(!is_array($l)){
			return false;
		}
		end($l);
		do{
			if(is_string(key($l))){
			$ss[key($l)]=current($l);
			}else{
				$ss[]=current($l);
			}
			prev($l);	
	 }while(current($l));
	return $ss;
	} 
	
	echo "<pre>";
	var_dump($a);
	echo "</pre>"."<br/>";
	
	echo "<pre>";
	var_dump(nake($a));
	echo "</pre>";
_______________________________________________________________________________________	
	//多个数组元素的合并   模仿系统函数功能
	
$arr1=array(1,2,3,4,5);
$arr2=array(6,7,8,9);	  
$arr3=array(10,11,12);
$arr4=array(12,13,14,15);

function puma(){
	
$old=func_get_args();	
foreach($old as $key=>$val){
	foreach ($val as $key1=>$val1){
		$new[]=$val1;
	}
}	
return $new;	
} 


echo "<pre>";
var_dump(puma($arr1,$arr2,$arr3,$arr4));
echo "</pre>";
*/




