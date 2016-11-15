<?php

    // This class is optional
    // Binary numbers

    function dec_base_10_to_bin($dec){
        $binStr = '';
        while ($dec>=1){
            $bin = $dec % 2;
            $dec = round($dec/2, 0, PHP_ROUND_HALF_DOWN);
            $binStr .= $bin;
        }

        $binStr = strrev($binStr);
        return $binStr;
    }

    function count_greatest_sequence_of_ones($str){
        $arr = explode('0',$str);
        return strlen(max($arr));
    }

    print(count_greatest_sequence_of_ones(dec_base_10_to_bin($n)));
 ?>
