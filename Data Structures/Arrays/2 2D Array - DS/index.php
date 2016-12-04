<?php

$handle = fopen ("php://stdin","r");
$arr = array();
for($arr_i = 0; $arr_i < 6; $arr_i++) {
   $arr_temp = fgets($handle);
   $arr[] = explode(" ",$arr_temp);
  array_walk($arr[$arr_i],'intval');
}
#aux map for tests
$map = array(
    array(0,0,0,0),
    array(0,0,0,0),
    array(0,0,0,0),
    array(0,0,0,0)
);
$max = -90;
for($i = 0 ; $i < 4 ; $i++){
    for($j = 0 ; $j < 4 ; $j++){
        $count =    $arr[$i][$j]        + $arr[$i][$j + 1]      + $arr[$i][$j + 2] +
                                          $arr[$i + 1][$j + 1]  +
                    $arr[$i + 2][$j]    + $arr[$i + 2][$j + 1]  + $arr[$i + 2][$j + 2] ;
        #map it
        $map[$i][$j] = $count;
        if ($count >= $max)
            $max = $count;

    }

}

echo $max;
?>
