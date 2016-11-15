<?php
    /**
    |---------------------------
    | Bubble Sort
    | @desc: Bubble Sort Algorthm Implementation
    | @author: Pihh - https://github.com/pihh
    *
    | @flux:
        1 - Loop through every element and switch if t's smaller than last enchant_dict_store_replacement
        2 - Repeat this loop until no switches has been made.
    |---------------------------
    */
    function bubbleSort(Array $A){

        $sorted = false;
        $lastUnsorted = count($A)-1;

        while(!$sorted){
            $sorted = true;
            for($index = 0; $index < $lastUnsorted ; $index++){
                if($A[$index] > $A[$index +1]){
                    $temp = $A[$index];
                    $A[$index] = $A[$index +1];
                    $A[$index +1] = $temp;
                    $sorted = false;
                }
            }
            $lastUnsorted--;
        }

        return $A;
    }

 ?>
