<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%s",$a);
fscanf($handle,"%s",$b);

$a = str_split($a);
$b = str_split($b);

$countA = count($a);
$countB = count($b);

$a = array_count_values($a);
$b = array_count_values($b);

$countOfEquals = 0;
foreach($a as $key => $pair){
    if(isset($b[$key])){
        if($b[$key] == $pair || $b[$key] > $pair){
            $countOfEquals += $pair *2;
        }else{
            $countOfEquals += $b[$key] *2;
        }
    }
}

$removed = $countA + $countB - $countOfEquals;

print($removed);
?>
