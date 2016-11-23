<?php

//Write your code here
class Calculator implements AdvancedArithmetic{
    public function divisorSum($n){
        $count = 0;
        for($i = 1; $i <= $n ; $i++){
            if($n % $i == 0){
                $count += $i;
            }
        }
        return $count;
    }
}
