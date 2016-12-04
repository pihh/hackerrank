<?php
    $_fp = fopen("php://stdin", "r");
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    fscanf($_fp,"%d %d",$n,$r);
    $arr = explode(' ',stream_get_contents($_fp));

    #Mod in order to get the divisor
    $index = $r % $n;

    #Arrays left and right
    $left = array_slice($arr,0,$index);
    $right = array_slice($arr,$index,$n);

    #merge and shift the arrays
    $arr = array_merge($right,$left);

    #print
    print implode(' ',$arr);
?>
