<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$a = array();
for($a_i = 0; $a_i < $n; $a_i++) {
   $a_temp = fgets($handle);
   $a[] = explode(" ",$a_temp);
  array_walk($a[$a_i],'intval');
}

//Step 1: Count gives us the size of the array (the number of rows in this case)
$len = count($a);
$sumPrimary = 0;
$sumSecondary = 0;

//Step 2 : Loop each array and get the value of the element in the diagonal position (0,0) (1,1) (2,2) ...
for($i = 0; $i < $len ; $i++){
	$sumPrimary += $a[$i][$i];
	$sumSecondary += $a[$i][$len -1 -$i];
}

//Step 3 : Print the abs of it
$dif = abs($sumPrimary - $sumSecondary);


print($dif);
?>
