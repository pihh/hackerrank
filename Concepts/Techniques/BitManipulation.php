<?php

    class BitManipulation{

        function base_convert($string_number, $fromBase, $toBase){

            return base_convert($string_number,$fromBase,$toBase);
        }

        function negative_base ($decimal, $base) {
            // initialise a digit stack
            $digits = [];
            // divide the decimal by the base repeatedly until the quotient is 0
            while ($decimal != 0) {
                // how many of the base exist in the quotient?
                $quotient = intval($decimal / $base);
                // modulus can return negative numbers
                $remainder = $decimal % $base;
                // negative base numbers do not have negative digits
                // if we get a negative remainder from the modulus
                // all we have to do is increment the quotient
                // and add the absolute value of the base to the remainder
                // This works because:
                //     (a/b = q r) -> (b*q + r = a) where
                //         a => numerator,
                //         b => denominator,
                //         q => quotient,
                //         r => remainder
                // If we get a negative remainder, we can just increment the quotient multiplying the denominator
                // giving us a number greater than the numerator
                // Subtracting this number from the numerator gives us a positive remainder
                // For example: (-5 / -2) => (2 r:-1) => (3 r:1) because [3 * -2 = -6 -> -6 + 1 -5 -> r:1]
                if ($remainder < 0) {
                    $quotient += 1;
                    $remainder += (-1 * $base);
                }
                // repeat the division using the new quotient
                $decimal = $quotient;
                // push the current number onto the stack
                array_unshift($digits, $remainder);
            }
            return $digits;
        }

        function dec_bin($Snumber, $bits = false){
            //Clean the variables
            $number = intval($number);
            $tmp_number = $number;

            //backup the original number, turn thuis into a positive one in case of being negative nubmer
            if($number < 0){
                $number *= -1;
            }

            // convert the positive number to binary
            $number = dec_bin($number);
            // Manual function:
            /*
            $dec=101;
            $binStr = '';
            while ($dec>=1){
                $bin = $dec % 2;
                $dec = round($dec/2, 0, PHP_ROUND_HALF_DOWN);
                $binStr .= $bin;
            }
            $binStr = strrev($binStr);
            */

            if($tmp_number < 0){
                //Step 1 of the conversion: get bits,

                //Step 2 save space for the signed

                //Step 3 invert

                //Step 4 add 1

                return $number;
            }else{
                return $number;
            }

        }

        function many_bits_needed_to_change_number(){
            // 12 = 01100
            // 16 = 10000
            // 3 bits EH !!!
        }
    }

?>
