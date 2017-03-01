<?
/*
*
*全排列
*	
*
*/
function fsRank($base, $temp=null)
{
    static $ret = array();
    $len = strlen($base);
    if($len <= 1)
    {
        //echo $temp.$base.'<br/>';
        $ret[] = $temp.$base;
    }
    else
    {
        for($i=0; $i< $len; ++$i)
        {
            $had_flag = false;
            for($j=0; $j<$i; ++$j)
            {
                if($base[$i] == $base[$j])
                {
                    $had_flag = true;
                    break;
                }
            }
            if($had_flag)
            {
                continue;
            }
            fsRank(substr($base, 0, $i).substr($base, $i+1, $len-$i-1), $temp.$base[$i]);
        }
    }
    return $ret;
}
print '<pre>';
print_r(fsRank('jki'));
print '</pre>';

