<?php
    // Recursive Functions <3

    $_fp = fopen("php://stdin", "r");
    fscanf($_fp,"%d",$n); // Many loops
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    $n = intval($n);

    // Recursion
    function Factorial($N,$res = false){
        if(!$res){
            return Factorial($N,$N);

        }else{
            if($N <= 1){
                return $res;
            }else{
                $N--;
                $res *= $N;
                return Factorial($N, $res);
            }

        }
    };

    print(Factorial($n));
?>
