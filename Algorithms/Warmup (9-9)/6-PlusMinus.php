<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$arr_temp = fgets($handle);
$arr = explode(" ",$arr_temp);
array_walk($arr,'intval');

$len = count($arr);
$counter = array(
	0,0,0
);

function sign($_i , &$counter){
	if($_i == 0){
        $counter[2]++;
    }elseif($_i > 0){
        $counter[0]++;
    }else{
        $counter[1]++;   
    }
}

for($i = 0; $i < $len ; $i++){
	sign((int)$arr[$i],$counter);
}

for($i = 0; $i <3 ;$i++){
	$print = $counter[$i]/$len;
	print("$print \n");

}

?>
