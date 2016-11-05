<?php
    $handle = fopen ("php://stdin","r");

    // Declare second integer, double, and String variables.
    $mealCost = (float)fgets($handle);
    $tip = $mealCost * (int)fgets($handle)/100;
    $tax = $mealCost * (int)fgets($handle)/100;
    $totalCost = (int)round($mealCost + $tip + $tax);

    $string = "The total meal cost is $totalCost dollars.";

    print($string);
?>