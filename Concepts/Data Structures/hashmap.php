<?php

/**
 |---------------------------
 | HashMap
 | @desc: Basic HashMap Class
    *
 | @todo: comment
 |---------------------------
 */


Class HashTable{
    private $_array = [];
    private $_size = 10000;
    
    public function __construct($size = 0){
        if($size > 0){
            $this->_size = $size;
        }
    }
    
   /**
    | Set Node 
    | @desc: Sets a node in the hashtable
    | @process: 
        * 
    */
    public function set($key,$value){
        $i = $orig_i = $this->_get_index($key);
        $node = new HashTableNode($key,$value);
        while(true){
            if(!isset($this->_array[$i] || $key == $this->_array[$i]->key)){
                $this->_array[$i] = $node;
                break;
            }
            
            //increment
            $i = (++$i % $this->_size);
            
            //Complete
            if($i == $orig_i){
                $this->_double_table_size();
                return $this->set($key, $value);
            }
        }
        return $this;
    }
    
    public function get($key){
        $i = $orig_i = $this->_get_index($key);
        while(true){
            if(!isset($this->_array[$i])){
                return null;
            }
            $node = $this->_array[$i];
            if($key == $node->key){
                return $node->val;
            }
            $i = (++$i % $orig_i);
            if($i == $orig_i){
                return null;
            }
        }
    }
    
    private function _get_index($key){
        return crc32($key) % $this->_size;
    }
    
    private function _double_table_size(){
        $old_size = $this->_size;
        $this->_size *= 2;
        $data = array();
        $collisions = array();
        for($i = 0 ; $i < $old_size; $i++){
            $node = $this->_array[$i];
            $j = $this->_get_index($node->key);
            if(isset($data[$j]) && $data[$j]->key != $node->key){
                $collisions[] = $node;
            }else{
                $data[$j] = $node;
            }
        }
        $this->_array = $data;
        foreach($collisions as $node){
            $this->set($node->key, $node->value);
            
        }
    }
}

Class HashTableNode{
    public $key;
    public $value;
    
    public function __construct($key,$val){
        $this->key = $key;
        $this->value = $val;
    }
}