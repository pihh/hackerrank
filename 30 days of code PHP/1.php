<?php

// Variable types 

$handle = fopen ("php://stdin","r");
$i = 4;
$d = 4.0;
$s = "HackerRank ";

// Declare second integer, double, and String variables.
$ii = (int)fgets($handle) + $i;
$dd = number_format(fgets($handle) + $d,1);
$ss = fgets($handle);
// Read and save an integer, double, and String to your variables.

// Print the sum of both integer variables on a new line.
print("$ii \n");

// Print the sum of the double variables on a new line.
print("$dd \n");


// Concatenate and print the String variables on a new line
// The 's' variable above should be printed first.
print("$s$ss");

fclose($handle);
?>