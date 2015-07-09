<?php
	function getSize($int){
		if($int<=1024){
			return $int." Byte";
		}elseif($int>pow(1024,4)){
			return round($int/pow(1024,4),2)." Tb";
		}elseif($int>pow(1024,3)){
			return round($int/pow(1024,3),2)." Gb";
		}elseif($int>pow(1024,2)){
			return round($int/pow(1024,2),2)." Mb";
		}elseif($int>pow(1024,1)){
			return round($int/pow(1024,1),2)." Kb";
		}
	}