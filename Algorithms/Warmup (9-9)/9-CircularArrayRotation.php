<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d %d %d",$n,$k,$q);
$a_temp = fgets($handle);
$a = explode(" ",$a_temp);

// Array of elements of Q
$B = array();
array_walk($a,'intval');
for($a0 = 0; $a0 < $q; $a0++){
    fscanf($handle,"%d",$m);
    //Build the array
    array_push($B, $m);
}

function rotate(Array $A, $k , $n){
    
    $mod = $k % $n;
    
    if($mod > 0){

		$a = array();
		$a[1] = array_slice($A, 0, $n - $mod);
		$a[0] = array_slice($A, $n -$mod, $n);
		$A = array_merge($a[0],$a[1]);

	}
    
    return $A;
}


$A = rotate($a, $k, $n);


for($i = 0; $i < $q ; $i++){
    if(isset($A[$B[$i]])){
        $print = (int)$A[$B[$i]];
        print("$print\n");
    }
}
?>