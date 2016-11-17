<?php
/**
I could have done solution + solution + solution but I didn't think about that
at the time ( thats the problem of studying after work LOL )
*/
$count = 0;
function solution($n){
    global $count;
    $n1 = $n -1;
    $n2 = $n -2;
    $n3 = $n -3;

    if($n1 <0 && $n2 <0&& $n3 <0){
      return $count;
    }
    if($n1 == 0 ){
      $count++;
    }
    if($n2 == 0){
      $count++;
    }
    if($n3 == 0){
      $count++;
    }

    $n--;
    solution($n,$count);
    $n--;
    solution($n,$count);
    $n--;
    solution($n,$count);

}
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$s);
for($a0 = 0; $a0 < $s; $a0++){
    fscanf($handle,"%d",$n);
    $count= 0;
    solution($n);
    echo "$count\n";
}

?>


/** Briliant Solution and super fast NOT MINE **/
<?php

$count = 0;
function solution($n){
    if ($n == 0) return 0;
    if ($n == 1) return 1;
    if ($n == 2) return 2;

    $f1 = 1;
    $f2 = 2;
    $f3 = 4;

    $f = $f3;
    for ($i = 3; $i < $n; ++$i) {
        $f = $f1 + $f2 + $f3;
        $f1 = $f2;
        $f2 = $f3;
        $f3 = $f;
    }
    return $f;


}
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$s);
for($a0 = 0; $a0 < $s; $a0++){
    fscanf($handle,"%d",$n);
    $count= 0;
    echo solution($n)."\n";

}

?>

?>
