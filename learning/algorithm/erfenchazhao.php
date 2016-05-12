<?php
//二分查找法
//原理:
//    二分查找又称折半查找，优点是比较次数少，查找速度快，平均性能好；
//    其缺点是要求待查表为有序表，且插入删除困难。因此，折半查找方法适用于不经常变动而查找频繁的有序列表。
//    首先，假设表中元素是按升序排列，将表中间位置记录的关键字与查找关键字比较，如果两者相等，则查找成功；
//    否则利用中间位置记录将表分成前、后两个子表，如果中间位置记录的关键字大于查找关键字，则进一步查找前一子表，
//    否则进一步查找后一子表。重复以上过程，直到找到满足条件的记录，使查找成功，或直到子表不存在为止，此时查找不成功。



//第一段代码是自己根据原理手动实现的.
//第二段代码在网上搜索到的代码 摘自: 脚本之家 http://www.jb51.net/article/48003.htm
//两段经过运行后对比分析 得出结论
//
//第二段代码在采用相同的求中值方法时运行次数基本一致,运行时间取多次平均值来说第一段的运行时间微少于第二段.时间基本一致.
//第二段代码采用插值求中值的方法时运行次数小于第一段代码,但是运行时间还是基本一致
//
//第一段代码入参的数组元素,如果是不连续的(如[1,3,5]),查找的key处于两个元素中间的值(如查找2),而这个值又不在目标数组中时. 第一段代码正常运行 第二段代码会报错
//


/**
 * 二分查找法手动实现
 *
 * @author yyg
 * @param $arr:目标数组; $need:需要查找的目标; $start:开始索引位置; $end:末尾索引位置
 * @date 2016 05 12
 *
 */
function test ($arr, $need, $start, $end, $time) {
    //设置变量记录运行次数
    $time++;
    //取中指
    $middle = $start+floor(($end-$start)/2);
    //对中指的上一个,下一个索引做防越界处理
    $prev = $middle-1 >= 0 ? $middle-1: 0;
    $next = $middle+1 <= $end ? $middle+1 : $end;
    //如果查找目标恰好为中值直接返回 大于中值或者小于中值继续调用本身继续进行查找 如果未查找到目标值返回字符串NO
    if ($need == $arr[$middle]) {
        return 'index is:'.$middle.'--运行次数'.$time;
    } elseif ($need > $arr[$middle] && $need <= $arr[$end]) {
        $start = $next;
        return test($arr, $need, $start, $end, $time);
    } elseif ($need < $arr[$middle] && $need >= $arr[0]) {
        $start = 0;
        $end = $prev;
        return test($arr, $need, $start, $end, $time);
    } else {
        return 'NO--'.$time;
    }
}


//需要查找的目标数组
$array = [6,7,8,9,10,11,12,15,16,19,21,32,41,52,67];
//$array = range(1,20000);

//目标数组的元素个数
$count = count($array);

$key = 8;//rand(1,20000);
//运行开始时间
$t1 = microtime(true);
var_dump(test($array,$key,0,$count-1,0));
//运行结束时间
$t2 = microtime(true);
echo '耗时'.round($t2-$t1,6).'秒';

echo '<hr/>';

//-------------------------------------------------------------------------------------------------------------------------分割线
//以下代码是在网上搜索到的代码 摘自: 脚本之家 http://www.jb51.net/article/48003.htm
//
/**
 * 二分查找递归解法
 *
 * @param type $subject
 * @param type $start
 * @param type $end
 * @param type $key
 *
 */
function binarySearch($subject, $start, $end, $key,$time)
{
    $time++;
    if ( $start >= $end  ) return FALSE;
    $mid = getMidKey($subject, $start, $end, $key);
    if ( $subject[$mid] == $key  ) return 'index is:'.$mid.'--运行次数'.$time;
    if ( $key > $subject[$mid]  ) {
        return binarySearch($subject, $mid, $end, $key,$time);
    }
    if ( $key <= $subject[$mid] ) {
        return binarySearch($subject, $start, $mid, $key,$time);
    }
}
/**
 * 求中值方法
 *
 */
function getMidKey($subject, $low, $high, $key)
{
 /**
 * 取中值算法1 取中值 不用 ($low+$high)/2的方式是因为
 * 防止low和high较大时候，产生溢出....
 *
 */

 return round($low + ($high - $low) / 2);
 /**
  * 经过改进的插值算法求中值，当数值分布均匀情况下，再降低算法复杂度到lglgN
  * 取中值算法2
  */

 //return round( (($key - $subject[$low]) / ($subject[$high] - $subject[$low])*($high-$low) )  );
}


//运行开始时间
$t1 = microtime(true);
var_dump(binarySearch($array,0,$count-1,$key,0));
//运行结束时间
$t2 = microtime(true);
echo '耗时'.round($t2-$t1,6).'秒';
