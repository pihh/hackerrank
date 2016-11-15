<pre>
<?php

$n = 5;
$sample_input = [
 'amy' =>  100,
 'david' => 100,
 'heraldo' => 50,
 'aakansha' => 75,
 'aleksa' => 150
];
/*
$sample_input = [
 'amy' =>  100,
 'david' => 100,
 'heraldo' => 100,
 'aakansha' => 100,
 'aleksa' => 100
];
*/

/**
 | Basic Quicksort
 | @desc: Used as starting point to build the custom quicksort
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
        if( $v > $pivot )
            $left[$k] = $v;
        else
            $right[$k] = $v;
    }

    return array_merge(quicksort($left), array($pivotKey => $pivot), quicksort($right));

};

/**
 | Custom QuickScort
 | @desc: Used the normal quicksort to build a custom quicksort adapted to this exercise
 */
function custom_quicksort( $array ) {


    if( count( $array ) < 2 ) {
        return $array;
    }
    $left = $right = array( );
    reset( $array );

    $pivotKey  = key( $array );
    $tmp = array_shift( $array );
    $pivot  = $tmp['value'];

    $i_left = 0;
    $i_right = 0;
    foreach( $array as $k => $v ) {
        if( $v['value'] > $pivot ){
            $left[$i_left] = [ 'key' => $v['key'], 'value' =>$v['value']];
            $i_left++;
        }elseif($v['value'] == $pivot ){

            // In the case of having equal values order by name

            $check = strnatcmp($v['key'], $tmp['key']);

            if($check == 1){
                $right[$i_right] = [ 'key' => $v['key'], 'value' =>$v['value']];
                $i_right++;
            }else{
                $left[$i_left] = [ 'key' => $v['key'], 'value' =>$v['value']];
                $i_left++;
            }

        }else{
            $right[$i_right] = [ 'key' => $v['key'], 'value' =>$v['value']];
            $i_right++;
        }

    }

    return array_merge(custom_quicksort($left), array($pivotKey => ['key' => $tmp['key'] , 'value' => $tmp['value']]), custom_quicksort($right));

};

/**
 | buildMultidimentionalArray;
 | @desc: Build a multidimentional array with 0 based index
 */

function buildMultidimentionalArray($array){
    // Expecting an array with format ['name' => 'ranking'];
    $index = 0;
    $A = array();
    foreach($array as $key => $pair){
        $A[$index] = [
            'key' => $key,
            'value' => $pair
        ];
        $index++;
    }

    return $A;
}


//$array = buildMultidimentionalArray($sample_input);
$array = buildMultidimentionalArray($sample_input);

var_dump(custom_quicksort($array));


 ?>
