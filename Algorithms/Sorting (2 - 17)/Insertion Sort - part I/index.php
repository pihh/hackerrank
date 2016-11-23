<?php
function insertionSort($ar) {
    $e = end($ar);
    $n = count($ar);

    for($i= $n-1; $i >= 0; $i--){
       if($ar[$i-1] > $e){
           $ar[$i] = $ar[$i -1];
       }else{
           $ar[$i] = $e;
           echo implode(' ',$ar)."\n";
           break;
       }
       echo implode(' ',$ar)."\n";

    }
}
$fp = fopen("php://stdin", "r");
fscanf($fp, "%d", $m);
$ar = array();
$s=fgets($fp);
$ar = explode(" ", $s);
for($i=0;$i < count($ar);$ar[$i++]+=0);

insertionSort($ar);
?>
