<?php

function IsPrime($n)
{
    if($n < 2){
        return 0;
    }
 for($x=2; $x*$x<=$n; $x++)
   {
      if($n %$x ==0)
          {
           return 0;
          }
    }
  return 1;
   }

function find_primes_range($start, $finish) {
  // Initialise the range of numbers.
  $number = 2;
  $range = range(2, $finish);
  $primes = array_combine($range, $range);

  // Loop through the numbers and remove the multiples from the primes array.
  while ($number*$number < $finish) {
    for ($i = $number; $i <= $finish; $i += $number) {
      if ($i == $number) {
        continue;
      }
      unset($primes[$i]);
    }
    $number = next($primes);
  }

  // Slice the array into the given range
  foreach ($primes as $prime) {
    if ($prime < $start) {
      unset($primes[$prime]);
    } else {
      break;
    }
  }
  return $primes;
}

?>
