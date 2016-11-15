<?php

class Solution{

    private $noteHash = [];
    private $magazineHash = [];
    
    private function frequency($array){
        $array = array_map('trim',$array);
        return array_count_values($array);
    }
    
    private function hasEnough($magazine, $note){
        foreach($note as $key => $pair){
            
            var_dump($magazine[$key], $value);
            
            if(!isset($magazine[$key]) || $magazine[$key] < $value ){
                return false;
            }
        }
        
        return true;
    }
    
    
    public function solve($note, $magazine){
        
        $this->noteHash = $this->frequency($note);
        $this->magazineHash = $this->frequency($magazine);
        
        $can = $this->hasEnough($this->magazineHash, $this->noteHash);
        var_dump($can);
    }
}

$s = new Solution();
$s->solve($ransom,$magazine);


?>