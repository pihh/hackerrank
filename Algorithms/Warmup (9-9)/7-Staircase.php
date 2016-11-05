<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);

$stringHash = '';
$stringSpace = '';
$arr =array(
	array(),
	array()
);

for($i = 0; $i < (int)$n ; $i++ ){
	$stringHash = $stringHash.'#';
	$stringSpace = ($i > 0)? $stringSpace.' ': '';

	array_push($arr[0],$stringHash);
	array_push($arr[1],$stringSpace);

}

while(!empty($arr[0])){
	print(end($arr[1]).$arr[0][0]."\n");
	array_pop($arr[1]);
	array_shift($arr[0]);
}

?>
