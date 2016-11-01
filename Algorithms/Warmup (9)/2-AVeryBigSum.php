<?php


$handle = fopen ("php://stdin","r");	//Open the stdin
fscanf($handle,"%d",$n);				//Read the file
$arr_temp = fgets($handle);				//Set the file contents as variable
$arr = explode(" ",$arr_temp);			//Convert it into an array
array_walk($arr,'intval');				//convert everything into an integer

print(array_sum($arr));					//Print the sum

?>