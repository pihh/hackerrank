<?php


function solution($expression){
    $open = ['(','{','['];
    $close = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    $arr = str_split($expression);
    $n = count($arr);
    $tmp = [];

    for($i = 0; $i < $n; $i++){

        if(in_array($arr[$i], $open)){
            array_push($tmp,$arr[$i]);
        }else{
            if(end($tmp) == $close[$arr[$i]]){
                array_pop($tmp);
            }else{
                return false;
            }
        }
    }

    if(count($tmp) > 0){
        return false;
    }else{
        return true;
    }
}

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$t);
for($a0 = 0; $a0 < $t; $a0++){
    fscanf($handle,"%s",$expression);
    (solution($expression))? print('YES'): print('NO');
    echo "\n";
}




?>