<?php
//Enter your code here

    class Calculator{


        public function power($n,$p){

            if($p < 0 || $n < 0){
                throw new Exception('n and p should be non-negative');
            }
            return pow($n,$p);
        }
    }
