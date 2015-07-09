<?php
$a=100;
$b=200;
if(($a=90) && ($b<100)){
$a+=100;
$b+=100;
}
echo "a=".$a;
echo "<hr/>";
echo "b=".$b;