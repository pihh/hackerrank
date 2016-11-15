<?php

$handle = fopen ("php://stdin","r");
$arr = array();
for($arr_i = 0; $arr_i < 6; $arr_i++) {
   $arr_temp = fgets($handle);
   $arr[] = explode(" ",$arr_temp);
  array_walk($arr[$arr_i],'intval');
}


// Minimum possble assuming that we have 7 inputs with a minimum of -9 ( if all are -9 the next smallest is: )
    $sum = 7 * -9 -1;

    //I'll assume that every array has 6 elements so, we have to count 0,1,2 | 1,2,3 | 2,3,4 | 3,4,5 | 4,5,6 -> 4 operations
    for($i = 0; $i <4 ; $i++){

        for($ii = 0; $ii < 4 ; $ii++){

            $tmp = $arr[$i][$ii]    +
                $arr[$i][$ii+1]     +
                $arr[$i][$ii+2]     +
                $arr[$i+1][$ii+1]   +
                $arr[$i+2][$ii]     +
                $arr[$i+2][$ii+1]   +
                $arr[$i+2][$ii+2];
            if ($tmp > $sum)
                $sum = $tmp;
        }

    }
    print($sum);
?>
