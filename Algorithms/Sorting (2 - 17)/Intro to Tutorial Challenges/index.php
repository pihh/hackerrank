<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp,"%d",$v);
fscanf($_fp,"%d",$n);
$ar = stream_get_contents($_fp);

$ar = explode( ' ',$ar);
array_walk($ar,'intval');


/* Enter your code here. Read input from STDIN. Print output to STDOUT */

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

    echo binarySearch($ar,$v)
?>
