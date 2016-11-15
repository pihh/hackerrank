<?php

/** Simple version **/
function binarySearch($array, $searchFor) {
$low = 0;
$high = count($array) - 1;
$mid = 0;

while ($low <= $high) { // While the high pointer is greater or equal to the low pointer
    $mid = floor(($low + $high) / 2);
    $element = $array[$mid];

    if ($searchFor == $element) { // If this is the value we're searching for
        return $mid;
    } else if ($searchFor < $element) {
        $high = $mid - 1;
    } else {
        $low = $mid + 1;
    }
}
   return -1;
}

$arr = [1,4,5,3,2];
sort($arr);
$searchFor = 4;

var_dump(binarySearch($arr,$searchFor));
?>
