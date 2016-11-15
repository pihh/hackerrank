<?php

/**
Had several segmentation faults (?) on theyr server.
Matched the cases I downloaded
*/
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$t);


    Class Sort{
        private $arr;
        private $end;
        private $index;
        private $max_index;
        private $swap_count = 0;
        private $debug = false;


        public function __construct($arr){
            $this->arr = $arr;
            $this->end = count($arr)-1;
        }

        public function sort(){
            return $this->confirm();
        }

        private function next(){

            $this->index = $this->max_index ;

            if($this->debug){
                echo "NEXT: ".$this->index."\n";
            }


            if($this->index > $this->end){
                //Ended
                return print($this->swap_count)."\n";

            }
            if(isset($this->arr[$this->index])){
                return $this->confirm();

            }

        }

        private function prev(){
            if($this->debug){
                echo "PREV: ".$this->index."\n";
            }
            if($this->index >= 1){
                // keeps going prev until all the array it's checked
                if(isset($this->arr[$this->index] ) && $this->arr[$this->index] < $this->arr[$this->index -1]){
                    $this->swap();

                }

                    $this->index--;
                    return $this->prev();

            }else{
                if(isset($this->arr[$this->index -1])  && $this->arr[$this->index] < $this->arr[$this->index -1]){
                    $this->swap();
                }
                return $this->next();
            }
        }

        private function confirm(){
            //check if arr current it's greater than arr before

            if($this->index >= $this->end){
                 if($this->arr[$this->end] <= $this->arr[$this->end -1]){
                     $this->prev();
                 }else{
                     print($this->swap_count);
                 }

            }elseif(isset($this->arr[$this->index -1]) && $this->arr[$this->index] >= $this->arr[$this->index -1]){
                 //echo $this->index."\n";
                 $this->max_index++;
                 return $this->next();
            }elseif(!isset($this->arr[$this->index -1])){
                $this->max_index++;
                 return $this->next();
            }else{
                 $this->swap();
                 return $this->prev();
             }
        }

        private function swap(){
            //echo "SWAP \n";
            if(isset($this->arr[$this->index -1]) && isset($this->arr[$this->index])){
                $tmp = [];
                $tmp[0] = $this->arr[$this->index -1];
                $tmp[1] = $this->arr[$this->index];

                $this->arr[$this->index -1] = $tmp[1];
                $this->arr[$this->index] = $tmp[0];
            }
            $this->swap_count++;
        }
    }

    for($a0 = 0; $a0 < $t; $a0++){
        fscanf($handle,"%d",$n);
        $arr_temp = fgets($handle);
        $arr = explode(" ",$arr_temp);
        array_walk($arr,'intval');

        //echo "NEW SORT: \n";
        $sort = new Sort($arr);
        $sort->sort();
        echo "\n";
        //echo "END: \n\n";
    }

?>
