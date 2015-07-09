<?php 
/*
	$a = date("N");
	switch($a){
		case 1:
			echo "aaaa<br/>";
		break;
		case 2:
			echo "bbbb<br/>";
	        break;
		case 3:
			echo "cccc<br/>";
	        break;
		case 4:
			echo "dddd<br/>";
			        break;
		case 5:
			echo "ffff<br/>";
	        break;
		case 6:;
			echo "agggg<br/>";
	        break;
		case 7:
			echo "hhhh<br/>";
	        break;
		default:"ggfgfgg<br/>";
		}


	$a = "di";
	switch($a){
		case"da":
		case"db":
		case "dc":
		case "dd":
		case"df":
		case"dg":
			echo "dddddddd";
			break;
		case"dh":
			echo "bbbbbbbbb";
			break;
		case"di":
			echo "aaaaaaaa";
			break;

		}
		
		$a=1;
		while($a<=100){
			echo $a."/";
			$a++;
		}

		$a=1;
		$b=0;
		while($a<=100){
			$b= $b + $a;
			$a++;
		}#1-100 和
		echo $b;
______________________________________________________________________

	$a=1;
	$b=0;
	while($a<=100){
		$a++;
		$a++;
		$b=$b+$a;
	}#2600
echo $b."<br/>";
__________________________________________________________________

$A=1;
$B=0;
while($A<=100){
	if($A%2==0){
		$B=$B+$A;
	}
	$A++;
}
echo $B;      、、//while循环做 100以内偶数的和
_________________________________________________________________________________


$a=1;
$b=0;
do{
	$b=$b+$a;
	$a++;
}while($a<=1000);
echo $b;   			//1-1000的数相加的和
_________________________________________________________________________

    
	for($a=1,$b=0;$a<=100;$a++){
		if($a%2==0){
					$b=$b+$a;
					}
	}echo $b;          //100以内的偶数的和
____________________________________________________________________________

for($a=1,$b=1;$b<10;$b++){
	if($b==9){		
	    echo $a."x".$b."=".$a*$b."<br/>";
		$a++;
		$b=$a;
		}
	echo $a."x".$b."=".$a*$b."&nbsp;"."&nbsp;"."&nbsp;";"<br/>";
  }
echo "<hr/>";  //99 乘法表


for($i=1;$i<=9;$i++){
	for($j=1;$j<=$i;$j++){
		echo $j."*".$i."=".$i*$j."&nbsp;.&nbsp;";
	}
	echo "<br/>";
}
echo"<hr/>";//99 乘法表


				
for($a=9,$b=9;$b>=1;$b--){
	if($b==1){
		echo $a."x".$b."=".$a*$b."<br/>";
		$a--;
		$b=$a;		
	}
	echo $a."x".$b."=".$a*$b."&nbsp;"."&nbsp;"."&nbsp;";"<br/>";
}
echo "<hr/>";//99 乘法表
echo "eeweqw";



echo "<table border='1' width='300px' height='300px' cellspacing='0'>";
for($a=1;$a<=10;$a++){
	if($a%2==0){
	echo "<tr bgcolor='#cccccc'>";
	}else{
	echo "<tr>";
	}
	for($b=1;$b<=10;$b++){
		echo"<td>";
		echo ($a-1)*10+$b;
		echo "</td>";		
	}
	echo"</tr>";
}
echo "</table>";    // 输出 10*10表格 并隔行换色




function tuxing($hang=1,$hangmax=6,$kongmax=0,$xingmax=11){
	$str="";
  for($a=$hang;$a<=$hangmax;$a++){
  	for($b=5-$a;$b>=$kongmax;$b--){

  		$str(echo).= "h";  //用空变量str链接所有将要输出到浏览器的的字符串
  	}
  	for($c=12-(2*$a-1);$c<=$xingmax;$c++){
  		$str(echo).= "*";
  	}
    	$str(echo).= "<br/>";
  }
  return $str; //将 所有链接好的字符串作为值返回到 函数的调用处 （函数名条用处）
 }
 $n = tuxing();//将值（所有字符串）赋值给$n，方便以后再其他文件中调用
 //echo tuxing(); //直接将tuxing（）输出 等同于 输出一个变量

 
   file_put_contents("11111.html",$n);
   //用命令新建一个网页文件调用N作为html语言
  file_put_contents("22222.html",tuxing());
  //效果同上 同一文件名无论输入多少次file命令都只创建一个新的文件
 
 
 
 
 
 
 $a = "ddd";

function abc(){
	global $a;  //global  可以将外部变量拿到 内部使用。
	var_dump($a); //局部变量 a 目前没有被赋值  NULL
$a = "ccc";	
     //var_dump($a); 如把var_dump放在这里 最后的 查询结果为 ddd 和 ccc两个字符串
}
abc();//调用函数 后 查询局部变量a （没被赋值）null
var_dump($a);//查询结果为字符串 ddd 


$hu="fff";

var_dump($hu);

function haha(){
	$d=$GLOBALS['hu'];
	$f = &$d;
	unset ($d);
	var_dump($f );
	}
haha();
var_dump($hu);

__________________________________________________________________________________________________


//定义一个函数abc
function abc($a){
	$a++;
}

//定义一个变量
$b=100;

abc(&$b);//可以让$a与$b互为别名     相当于$a= &$b;

echo $b;
_______________________________________________________________________________________________


//定义一个函数abc
function abc(&$a){	
	$a++;
}
//定义一个变量$b
$b=100;

abc($b);//可以让$a与$b互为别名    相当于$a= &$b;
echo $b;


//将& 放在 a 与 b 前面 的效果是一模一样的
  
  
 
 _____________________________________________________________________________________


//声明一个函数

function abc(){
	//我们声明一个静态变量 $a
	//静态变量只初始化一次
	static $a=0; //去掉static输出的是 111111 
				//static 后的变量后的值 只能为常量 不能为任何表达式
	$a++;
	echo $a;
	}
abc();
abc();
abc();
abc();
abc();
abc();
——————————————————————————————————————————————————————————————————————————————————————————————————

function aa($s){
	echo "gaga";
	
	$s();//函数名称（）  调用外部的规则函数
	echo "haah";
}

aa(QQ);
//定义辅助函数的功能
function qq(){
	echo "QQ";
}
function ww(){
	echo "ww";
}
function ee(){
	echo "ee";
}



function jisuan($a,$b,$op){     
	return $op($a,$b);
	//return 会接收 辅助函数中经规则处理后的值 然后再返回到 函数调用处
}
//计算器  回调函数
echo jisuan(3,3,cheng);



//设定 辅助函数的功能
function jia($a,$b){
	return $a+$b;
}
//在 辅助函数中设置算法 然后return 算法处理后的值 返回给主函数到 return $op(); 处。
function jian($a,$b){
	return $a-$b;
}

function cheng($a,$b){
	return $a*$b;
}

function chu($a,$b){
	return $a/$b;
}

function qvyu($a,$b){
	return $a%$b;
}

function leijia(){
	static $a=1;
	static $b=0;
	if($a<=100){
		$b += $a;
		$a++;
		leijia();}
	return $b;	
}
 
echo leijia()."<br/>";  //递归函数做1-100累加

function leijia1($n){
	if($n==1){
		return 1;
	}
	return $n+leijia1($n-1);
}
echo leijia1(1480);//层数1479



echo sum(1,2,4,5,56,6,7,7);

function sum(){
	//func_get_arg($i)
	//echo func_get_arg(1);获取指定索引的实际参数的值
	
	//func_num_args()获取所有的实际参数的个数
	//echo func_num_args();	
	for($i=0,$sum=0;$i<func_num_args();$i++){
		
		$sum += func_get_arg($i);
	} 
	
		return $sum;
}

include './函数名.所在文件';
include_once ("./函数名.所在文件 "); //加once以后 系统会判断当前函数是否被加载过如果加载过 不再加载

require "./函数名.所在文件";
require_once ("./函数名.所在文件");// 同上
 */

/* function abc(&$a){
	$a++;
}

//定义一个变量
$b=100;

abc($b);//可以让$a与$b互为别名     相当于$a= &$b;

echo $b;
 */

//header("content-type:text/html;charset=utf-8");
//声明一个数组，使用直接赋值的方式

/* $arr[] = "哈哈";
$arr[] ="呵呵";
$arr[] = "嘎嘎";
$arr[] = "呼呼哈哈";
$arr[6] = "dada";
$arr[] = "faf";
print_r($arr); 
  
$arr=array(1,2,3,4);
$arr=array(18=>2,54=>4,44=>1);
$arr=array(0=>1,1=>2,2=>3,4=>4);
$arr=array(1,2,3,4,5,6,1=>3,4=>12,6=>4,6=>44,22);

echo "<pre>";
var_dump($arr);
echo "</pre>";
*/
/*  $news = array(
		'news'=>array(
					array(
						'title'=>"二愣子跟二愣子结婚",
						'liyapeng'=>array( 
									'呼呼',
									'噶',
									'嘎嘎',								
										),
						'wangfei'=>array(
									'发放',
									'嘎达到',
									'也热'
										),
						 'aajaja'=>array(
									'太委屈',
						 			'伊萨'
										),			
					array (
						'da'=>array(
									'发生法',
									'啊发发'
									),
						'rrq'=>array(
									'而且',
									'额企鹅全文'
									)	
						)				
					)
				)
			);


echo "<pre>";
var_dump($news);
echo "</pre>"; */
/*
$arr=array(1,2,3,4,5,6,6,7);

for($i=0,$c=count($arr);$i<$c;$i++){
	echo "$i.---.$arr[$i].<br/>";
};

	$arr=array(1,2,3,4,5,6,6,7);
	
	foreach($arr as $key=>$val){
		echo "$key---$val <br/>";
}
*/
/* $arr=array(1,2,3,4);

list($a,$b,$c,$d,$e) = $arr;
echo "$a<br/>";
echo "$b<br/>";
echo "$c<br/>";
echo "$d<br/>";
echo "$e<br/>";

$s=each($arr);
echo "<pre>";
var_dump ($s);
echo "</pre>";

$arr=array(1,2,3,4);
//$d=each($arr)
//list($a,$b)=$d
//如果while条件为false  终止循环  每调用一次each 指针向后跳一位 一次获取数组的值
while(list($a,$b)=each($arr)){
	echo $a."--".$b."<br/>";
}


$arr=array(2,4,5,6);

echo key($arr)."__".current($arr);
next($arr);
echo key($arr)."__".current($arr);
prev($arr);
echo key($arr)."__".current($arr);
end($arr);
echo key($arr)."__".current($arr);
reset($arr);
echo key($arr)."__".current($arr);

next($arr);
echo key($arr)."__".current($arr);



$arr=array("a"=>1,2,5,"b"=>3);


while(null!==($key=key($arr))){
	echo key($arr)."__".current($arr)."<br/>"; 
	next($arr);
}

*/
$zong=array(
		array(
		'name'=>zhangsan,
		'sex'=>man,
		'age'=>18				
		),
		array(
		'name'=>lisi,
		'sex'=>man,
		'age'=>21				
		),	
		array(
			'name'=>wangwu,
			'sex'=>woman,
			'age'=>32
			),
		array(
				'name'=>zhaoliu,
				'sex'=>woman,
				'age'=>20
			)
);
/* echo "<pre>";
var_dump($zong);
echo "</pre>"; */
 
echo "<table width='300px' height='200px' border='1' cellspacing='0'>";
echo "<tr>";
echo "<th>";
echo "姓名";
echo "</th>";
echo "<th>";
echo "性别";
echo "</th>";
echo "<th>";
echo "年龄";
echo "</th>";
foreach($zong as $val){
	echo "<tr>";
	echo "<td>{$val['name']}</td>";
	echo "<td>{$val['sex']}</td>";
	echo "<td>{$val['age']}</td>";
	echo "</tr>";
	}
	  for($a=1;$a<=4;$a++){
			echo"<tr>";	
			for($b=1;$b<=3;$b++){
			echo "<td>";
			echo '1';
			echo "</td>";	
						}			 	
	echo "</tr>"; 
} 
echo "</table>";








