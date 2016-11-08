<?php
/*
class Trie{
    
    private $strArray = [];
    
    private $hashMap = [
        '_words' => 0
    ];
    
    private function nodeTemplate($words = 0, $timesWord = 0, $isWord= false ){
        return [
            '_words' => $words++,
            '_isWord' => $isWord,
            '_countWord' => $countWord
        ];   
    }
    
    /**
     | Create Word
     | @desc: Creates a word
     | @todo: continue this method later by implementing _isWord and _isSingleWord 
     *
    
    public function create($word){
        $this->strArray = str_split($word);
        
        $node = &$this->hashMap;
 
        $len = count($this->strArray);
        $i = 0;
        foreach($this->strArray as $key){
            
            if(!isset($node[$key])){
                $node[$key] = ['_words' => 1];//$this->nodeTemplate($key);
            }else{
                $node[$key]['_words']++;
            }
            $i++;
            
            $node = &$node[$key];
            
        }
 
        
    }
    
    /**
     | Delete word
     | @todo:
     *
    public function delete($word){
        $this->strArray = str_split($word);
        
        $node = &$this->hashMap;
        $len = count($this->strArray);
        $i = 0;
        foreach($this->strArray as $key){

            $i++;
        
            
            $node = &$node[$key];
            
        }
    }
    
     /**
     | Has Word
     | @desc: Checks if this node is a word
     | @todo: continue this method later by implementing _isWord
     *
    
    public function hasWord($word){
        $this->strArray = str_split($word);
        
        $node = &$this->hashMap;
        $len = count($this->strArray);
        $i = 0;
        foreach($this->strArray as $key){

            if(!isset($node[$key])){
                return false;
            }
            if($i == $len){
                if($node['_words']){
                    return true;
                }else{
                    return false;
                }
            }
            $node = &$node[$key];
            
        }
        
        return true; // fallback for empty
    }
    
    /**
     | Count Words
     | @desc: counts the number of words in the array 
     *
    
    public function countChildWords($word){
        //iterate to node
        $this->strArray = str_split($word);
        
        $node = &$this->hashMap;
        $len = count($this->strArray);
        $i = 0;
        foreach($this->strArray as $key){
            $i++;
            if(!isset($node[$key])){
                return 0;
            }
            if($i == $len){
                return $node[$key]['_words'];
            }
            $node = &$node[$key];
            
        }
    }
    
     /**
     | Get child words
     | @desc: counts the number of words in the array 
     | @todo: continue this method later
     *
    
    public function getChildWords(){
        
    }
    
    public function getHashMap(){
        
        echo '<pre>';
        var_dump($this->hashMap);
    }
    
}


// USAGE:
$trie = new Trie();
$trie->create('p');
$trie->create('a');
$trie->create('b');
$trie->create('pi');
$trie->create('pihh');
$trie->create('pioh');
$trie->create('piox');
$trie->create('x');
$trie->create('pihh');


//$trie->getHashMap();
var_dump($trie->countChildWords(''));       //0
echo "\n";
var_dump($trie->countChildWords('p'));      //4
echo "\n";
var_dump($trie->countChildWords('pi'));     //3
echo "\n";
var_dump($trie->countChildWords('pih'));    //1
echo "\n";
var_dump($trie->countChildWords('pihh'));   //1
echo "\n";
var_dump($trie->countChildWords('pio'));    //1
echo "\n";
var_dump($trie->countChildWords('piox'));    //1
echo "\n";
var_dump($trie->countChildWords('pioh'));   //1
echo "\n";
var_dump($trie->countChildWords('pio'));   //1

$trie->hasWord('pihh');     // Should print true;
$trie->printStructure();    // Prints the tree;
$trie->printWords();        // Prints the words
*/

Class Node(){
    
    private $chars = 26;
    private $countChildern = 0;
    private $list = [];
    
    private getCharIndex($char){
        return array_search($char, $this->list); // $key = 2
    }
    
    private function _get(){
        
    }
    
    private function _set(){
        
    }
    
    public function add(){
        
    }
    
    public function findCount(){
        
    }
    
}

Class Trie(){
    
    public $hashMap = array();
    
    public function setNode($char ,$arr = $this->hashMap){
        if(!isset($arr[$char])){
            $arr[$char] = new Node();
        }
        return $arr[$char];
    }
}


?>
