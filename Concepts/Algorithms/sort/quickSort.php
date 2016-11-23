<?php


/**
|---------------------------
| Quick Sort
| @desc: Quick Sort Algorthm Implementation
| @author: Pihh - https://github.com/pihh
*
| @flux:
    1 - Loop through every element and switch if t's smaller than last enchant_dict_store_replacement
    2 - Repeat this loop until no switches has been made.
|---------------------------
*/

function quicksort( $array ) {
    if( count( $array ) < 2 ) {
        return $array;
    }
    $left = $right = array( );
    reset( $array );

    $pivotKey  = key( $array );
    $pivot  = array_shift( $array );

    foreach( $array as $k => $v ) {
        if( $v < $pivot )
            $left[$k] = $v;
        else
            $right[$k] = $v;
    }

    return array_merge(quicksort($left), array($pivotKey => $pivot), quicksort($right));
}

?>
