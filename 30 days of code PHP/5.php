<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);

$string = function($i) use($n){
    (int)$result = intval($n) * intval($i);
    print("$n x $i = $result\n");
    return;
};

for($i= 1; $i <= 10 ; $i++){
    $string($i);
}


?>
