<?php

    $handle = fopen ("php://stdin","r");
    fscanf($handle,"%d",$n);
    $a_temp = fgets($handle);
    $a = explode(" ",$a_temp);
    array_walk($a,'intval');

    $a =array_count_values($a);
    $a = array_flip($a);

    if(isset($a[1])){
        print($a[1]);
    }

    /**
        BIT MANIPULATION TECHNIQUE ON JAVA
        public static int lonelyInteger(int[] a) {
            int value = 0;

            for (int i : a) {
                value ^= i;
            }
            return value;
        }
    1) Any number xor'd with itself will give zero.
    2) Any number xor'd with zero will give the number.
    3) We are told there is an odd number of numbers in the array and they are all pairs of the same number, apart from one.

    So if we xor all the numbers in the array together then any which are the same will cancel out - and give zero as the result of all the xors.

    Then we are left with the unique number, which xor's with zero and so gives the unique number as the answer.
    */
?>
