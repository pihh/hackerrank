<pre>
<?php

include_once('BitManipulation.php');

$n = 10;
$fromBase = 10;
$toBase = 2;
$bit = new BitManipulation();

echo "N = $n, from base $fromBase to base $toBase expected output: 1010 , real output: ".$bit->base_convert($n,$fromBase,$toBase)."\n";


$n = 1010;
$fromBase = 2;
$toBase = 10;

echo "N = $n, from base $fromBase to base $toBase output: 10 , real output: ".$bit->base_convert($n,$fromBase,$toBase)."\n";


$n = -10;
$fromBase = 10;
$toBase = 2;

echo "N = $n, from base $fromBase to base $toBase expected output: 0001 , real output: ".$bit->base_convert($n,$fromBase,$toBase)."\n";


echo $bit->dec2bin_i('-2');
?>
