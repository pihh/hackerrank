<?php
$handle = fopen ("php://stdin","r");
    //Fibonacci Array Generator
    function fibonacciGenerator($q, $zero = false){
    	if($q >= 2){
    		$f = ($zero) ? [0,1] : [1,1];
    		for($i = 2; $i < $q; $i++){
    			$f[$i] = $f[$i-1] + $f[$i-2];
    		}
    		return $f;
    	}
    	return ($q == 1) ? [1] : [];
    }

    //exibindo os primeiros 20 números da sequência de fibonacci, começando por 0
    $fib = fibonacciGenerator(20, true);
    // foreach($fib as $v){
    // 	echo (end($fib) == $v) ? $v : $v.', ';
    // }


    //Recursive fibonacci
    function fibonacciRecursive($n){
        if($n==1){
            return 0;
        }
        if($n==2){
            return 1;
        }
        else{
            $sum = fibonacciRecursive($n-1)+fibonacciRecursive($n-2);
            return $sum;
        }

    }
    $fib = fibonacciRecursive(29);
    //echo $fib;  

    //Linear fibonacci
    function fibonacci($n) {
        // Write your code here.
        return ((pow(((1+sqrt(5))/2 ) ,$n)  -  pow(((1-sqrt(5))/2) ,$n))/sqrt(5));
    }

    $n = fgets($handle);

    printf("%d", fibonacci($n));



fclose($handle);
?>
