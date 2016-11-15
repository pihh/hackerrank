<?php
function isPrime($n){
    if($n <= 1){
        return false;
    }

    if ($n == 2)
        return true;
    if ($n == 3)
        return true;
    if ($n % 2 == 0)
        return false;
    if ($n % 3 == 0)
        return false;

    $i = 5;
    $w = 2;

    while( $i * $i <= $n){
        if ($n % $i == 0)
            return false;

        $i += $w;
        $w = 6 - $w;
    }


    return true;
}
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$p);
for($a0 = 0; $a0 < $p; $a0++){
    fscanf($handle,"%d",$n);

    (isPrime($n))?
        print "Prime\n":
        print "Not prime\n";
}
?>
