<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d %d",$n,$k);
$a_temp = fgets($handle);
$a = explode(" ",$a_temp);
array_walk($a,'intval');



function printOutput($n,$k,$arr){
	$mod = $k % $n;
	if($mod == 0){
		return implode(' ', $arr);
	}else{
		$a = array();
		$a[1] = array_slice($arr, 0, $mod);
		$a[0] = array_slice($arr, $mod, count($arr));
		return implode(' ',array_merge($a[0],$a[1]));
	}
}

print(printOutput($n,$k,$a));

?>
