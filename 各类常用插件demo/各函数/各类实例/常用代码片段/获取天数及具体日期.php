<?php
// 获取天数
function dateDiff($date1, $date2) {
		$datetime1 = new DateTime($date1);
		$datetime2 = new DateTime($date2);
		$interval = $datetime1->diff($datetime2);
		return $interval->format('%a');
	}

// 	echo dateDiff($date1, $date2);
// 获取具体日期
function prDates($start, $end) { 
    $dt_start = strtotime($start); 
    $dt_end   = strtotime($end); 
    do { 
       $arr[]=date('Y-m-d', $dt_start);
    } while (($dt_start += 86400) <= $dt_end);
    return $arr;
}

// 获取具体日期
// function prDates($start,$end){
//     $dt_start = strtotime($start);
//     $dt_end = strtotime($end);
//     while ($dt_start<=$dt_end){
//         //echo date('Y-m-d',$dt_start)."\n";
//         $arr[] = date('Y-m-d',$dt_start);
//         $dt_start = strtotime('+1 day',$dt_start);
//     }
//     return $arr;
// }

?>