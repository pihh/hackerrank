<?php
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$count = intval(fgets($_fp));

function IsPrime($n)  {
    if($n < 2){
        return 0;
    }
    for($x=2; $x*$x<=$n; $x++)  {
        if($n %$x ==0){
            return 0;
        }
    }
    return 1;
}


for($i = 0; $i < $count; $i++){
    $n = intval(fgets($_fp));
    $primes = isPrime($n);

    ($primes > 0)?
        print "Prime\n":
        print "Not prime\n";
}
?>
