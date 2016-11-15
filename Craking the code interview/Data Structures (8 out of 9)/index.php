<?php

$dictionary = new SplFixedArray();
$dictionary_count = new SplFixedArray();
$index = 0;

$add = function($word,$index) use (&$dictionary,&$dictionary_count){

        $arr = str_split($word);
        $n = count($arr);
        $str = '';

        for($i = 0; $i < $n ; $i++){
            $str .= $arr[$i];
    	   if(!in_array($str,$dictionary)){
    			$dictionary[$index] = $str;
                $dictionary_count[$index]= 1;
    		}else{
    			$dictionary_count[$index]++;
           }
    	}

};

$find = function($word) use(&$dictionary){
    $count = 0;

    if(isset($dictionary[$word]))
       $count = $dictionary[$word];

    return $count;
};

// $handle = fopen ("tries/input5.txt","r");
// fscanf($handle,"%d",$n);
$stream = file_get_contents("tries/input5.txt");
$stream = explode("\r\n",$stream);

$n = $stream[0];
array_shift($stream);

echo memory_get_peak_usage();
for($a0 = 0; $a0 < $n; $a0++){

    if(isset($stream[$a0])){
        $tmp = explode(" ", $stream[$a0]);
        $op = $tmp[0];
        $contact = $tmp[1];

        if(trim($op) == 'add'){
	           $add($contact,$i);
	     }
	   if(trim($op) == 'find'){
		         //print($find($contact)."\r\n");
	   }
    }

}

?>
