<?php

    $handle = fopen ("php://stdin","r");
    fscanf($handle,"%d",$n);
    $a_temp = fgets($handle);
    $a = explode(" ",$a_temp);
    array_walk($a,'intval');

    function solution($a){

    /* Bubble Sort Version
        for (int i = 0; i < n; i++) {
        // Track number of elements swapped during a single array traversal
        int numberOfSwaps = 0;

        for (int j = 0; j < n - 1; j++) {
            // Swap adjacent elements if they are in decreasing order
            if (a[j] > a[j + 1]) {
                swap(a[j], a[j + 1]);
                numberOfSwaps++;
            }
        }

        // If no elements were swapped during a traversal, array is sorted
            if (numberOfSwaps == 0) {
                break;
            }
        }
    */
        $len = count($a);
        $lastIndex = $len-1;
        $numSwaps = 0;

        for($index = 0; $index < $len ; $index++){
            // Track number of elements swapped during a single array traversal
            $numberOfSwaps = 0;

            for ($j = 0; $j < $len - 1; $j++) {
                // Swap adjacent elements if they are in decreasing order
                if ($a[$j] > $a[$j + 1]) {
                    //swap($a[$j], $a[$j + 1]);
                    $tmp = $a[$j];
                    $a[$j] = $a[$j + 1];
                    $a[$j + 1] = $tmp;

                    $numberOfSwaps++;
                    $numSwaps++;
                }
            }

            // If no elements were swapped during a traversal, array is sorted
            if ($numberOfSwaps == 0) {
                break;
            }
        }

        $template = "Array is sorted in $numSwaps swaps.\nFirst Element: $a[0]\nLast Element: $a[$lastIndex]";
        print($template);
    }

    solution($a);

 ?>
