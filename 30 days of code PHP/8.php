<?php

// Dictionarys and maps :D
// Given the description of this class, I'll supose we are using simple arrays and no binary trees.

$_fp = fopen("php://stdin", "r");
$_fp = fopen("data/input8.txt", "r");
fscanf($_fp,"%d",$n); // Many loops
$arr_temp = stream_get_contents($_fp);
$arr = explode("\n",$arr_temp);
array_walk($arr,'trim');
$dictionary = [];
$i = 0;


//Build the arrays
while($i < $n){
    $tmp = explode(" " , $arr[$i]);
    $dictionary[$tmp[0]] = $tmp[1];
    $i++;
}


//Print the outputs
$n = $n * 2;
while($i < $n){
    // Can have less than n*2
    if(isset($arr[$i])){
        (isset($dictionary[$arr[$i]]))?
            print($arr[$i]."=".$dictionary[$arr[$i]]."\n"):
            print("Not found\n");
        $i++;
    }else{
        break;
    }

}




?>
