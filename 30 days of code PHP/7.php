<?php
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$arr_temp = fgets($handle);
$arr = explode(" ",$arr_temp);
array_walk($arr,'intval');

$arr = array_reverse($arr);
print(trim(implode(' ',$arr)));
 ?>
