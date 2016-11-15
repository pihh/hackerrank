<?php
    /**
    |---------------------------
    | Ice Cream Parlor
    | @author: Pihh - https://github.com/pihh
    | @conditions:
        * all the money must be spent
        * on exactly 2 ice creams
        * with 2 distinct flavours
        * return the keys , not the values ( this case it's not zero indexed but 1 indexed keys )
        * ALLWAYS has 1 unique solution
        * the icecream price is allways greater than 0
    | @strategy:
        * backup the array
        * loop it until it has a match ( more comments on the code )
    | @todo: use binary search algorithm instead of PHP native functions
    |---------------------------
     */

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$t);
for($a0 = 0; $a0 < $t; $a0++){
    fscanf($handle,"%d",$m);
    fscanf($handle,"%d",$n);
    $a_temp = fgets($handle);
    $a = explode(" ",$a_temp);
    array_walk($a,'intval');

    //Backup the array so we can compare it to the original
    $tmp = $a;

    //Loop through each flavour ( key = flavour, value = cost)
    foreach($a as $key => $value){

        //The value we are searching is: the total money they have, subract the cost of the current flavour
        $search = $m - $value;

        //If exists in the array $a a flavour that costs exactly $search, then we have a match, else remove current flavour from $a, this can be seen as : this flavour has no matches so we discard it.

        if(in_array($search,$a)){

            // First to be printed is the current key ( the smaller one -> dont forget we are iterating from left to right )
            $first = $key;
            // Second will return false or a key and we will be searching the backup array.
            $second = array_search($search, $tmp);

            //False can be == 0 , so we need === or in this case !== 0
            if($second !== false){

                // Now, for example we can have two flavours that cost 2$ and we have 4$, and it's easy to see that we can fail here by using the same flavour twice. So, if the second !== to the current key all good, else, we need to see if the original array has 2 keys with the same value
                if($second !== $key){
                    // increment both because they want it 1 indexed and not 0 indexed, so the index will allways be +1
                    $key++;
                    $second++;

                    //Print and end with this foreach loop
                    print("$key $second\n");
                    break;
                }else{
                    //So, in this case we have to check if the orignal array has two diferent keys with this value, so
                    // 1- we backup the key's value
                    // 2- we give it a value outside our scope.
                    // 3- we search it again.
                    $backup_value = $tmp[$key];
                    $tmp[$key] = -1;
                    $second = array_search($search, $tmp);
                    if($second !== false){
                        $key++;
                        $second++;

                        //Print and end with this foreach loop
                        print("$key $second\n");
                        break;
                    }
                    // In this case it failed so, lets rollback the changes above.
                    $tmp[$key] = $backup_value;
                }

            }

        }

        array_shift($a);
    }

}

?>
