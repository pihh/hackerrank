<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$a_temp = fgets($handle);
$a = explode(" ",$a_temp);
array_walk($a,'intval');

function printResult($a,$b,$c){
    if(isset($a) && isset($b) && isset($c)){

        print "Array is sorted in $a swaps.\n";
        print "First Element: $b\n";
        print "Last Element: $c\n";
    }

}

function bubbleSort(Array $A){

    $sorted = false;
    $lastUnsorted = count($A)-1;
    $swaps = 0;

    while(!$sorted){
       $sorted = true;
       for($index = 0; $index < $lastUnsorted ; $index++){
            if($A[$index] > $A[$index +1]){
                $swaps++;
                $temp = $A[$index];
                $A[$index] = $A[$index +1];
                $A[$index +1] = $temp;
                $sorted = false;
            }
       }
       $lastUnsorted--;
    }

    return [$A,$swaps];
}

$result = bubbleSort($a);

printResult($result[1],$result[0][0],end($result[0]));

?>
