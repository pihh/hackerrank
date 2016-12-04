<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$t);
for($a0 = 0; $a0 < $t; $a0++){
    fscanf($handle,"%d %d",$n,$k);

    $max = 0;
    for($i = 1; $i <= $n; $i++){

        for($j = $i+1; $j <= $n ; $j++){

            $current = $i & $j;
            if($current > $max && $current < $k){
                $max = $current;
            }

        }
    }


    echo "$max\n";
}

?>
