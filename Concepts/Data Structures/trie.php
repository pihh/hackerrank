<?php
/**
  |---------------------------
  | My Trie Class
  | @desc: Less Memory consuming than the last class
  | @author: https://github.com/pihh
  | @todo: To spare memory ( having runtime exceptions in this exercise ),
    will try achieve the same using iterators because for loops create a
    tmp copy of the array in memory.
  | @note: my exmaples are giving equal results
  |---------------------------
  */
    Class MyOwnTrie{
    	private static $arr = [] ;
    	private static $template = [
    		'_isWord' => false,
    		'_childWords' => 1
    	];

    	public function __construct(){

    	}

    	public static function add($word){
    		$word = preg_replace('/\s+/', '', $word);
    		$arr = str_split($word);
    		$len = count($arr);

    		$node = &self::$arr;

    		for($i = 0; $i < $len ; $i++){
    			if(!isset($node[$arr[$i]])){
    				$node[$arr[$i]] = self::$template;
                    if($i == $len -1 && isset($node[$arr[$i]])){
                        $node[$arr[$i]]['_isWord'] = true;
                    }
    			}else{
    				$node[$arr[$i]]['_childWords']++;
    				if($i == $len -1 && isset($node[$arr[$i]])){
    					$node[$arr[$i]]['_isWord'] = true;
    				}
    			}
    			$node = &$node[$arr[$i]];
    		}
    	}

    	public static function find($word, $index = 0 , $array = false){
    		if($word != ''){
    			$word = preg_replace('/\s+/', '', $word);
    		if(!$array){
    			$array = self::$arr;
    		}

    		$letter = substr($word, $index, 1);
    		if (isset($array[$letter])) {
    			if ($index == strlen($word) - 1) {
    				return $array[$letter];
    			} else if ($index < strlen($word)) {
    				return self::find($word, $index + 1, $array[$letter]);
    			}

    		}
    		return false;
    		}
    	}

    	public static function countChild($word){
    		$_word = self::find($word);
    		if($_word){
    			if(isset($_word['_childWords'])){
    				return intval($_word['_childWords']);
    			}else{
    				return 0;
    			}
    		}
    		return 0;
    	}

    	public static function getTrie(){
    		return var_export(self::$arr);
    	}
    }


  /**
    |---------------------------
    | Trie Class
    | @desc: Class that uses nodes containing letters and pointers to
        efficiently store words
    | @author: http://parkerbossier.blogspot.pt/2011/12/creating-php-trie.html
    |---------------------------
    */
  class Trie
  {

  	// Properties
  	public $root;

  	// Constructor
  	public function __construct()
  	{
  		$this->root = new TrieNode(' ');
  	}

  	// Methods
  	// Adds a word to the trie
  	public function addWord($word)
  	{
  		// Make the word string into an array for easier processing
  		$word = str_split($word);

  		// Start at the root node
  		$curNode = & $this->root;

  		// Loop through the word
  		foreach ($word as $curLetter)
  		{
  			// Advance the current node if possible
  			if (isset($curNode->pointers[$curLetter]))
  			{
  				$curNode = & $curNode->pointers[$curLetter];
  			}

  			// Otherwise, add a new node and update the current node
  			else
  			{
  				$curNode->pointers[$curLetter] = new TrieNode($curLetter);
  				$curNode = & $curNode->pointers[$curLetter];
  			}
  		}
  	}

  	// Returns true if the given word exists in the trie, false otherwise
  	function checkWord($word)
  	{
  		// Start at the root node
  		$curNode = & $this->root;

  		// Loop through the word
  		while (strlen($word) >= 0)
  		{

  			// Return success if the word has no letters left
  			if (strlen($word) == 0)
  			{
  				return true;
  			}

  			// Extract the first letter
  			$curLetter = $word[0];

  			// Advance the current node if possible
  			if (isset($curNode->pointers[$curLetter]))
  			{
  				$curNode = & $curNode->pointers[$curLetter];

  				// Update the word (remove the first letter)
  				$word = substr($word, 1);
  			} else
  			{
  				return false;
  			}
  		}
  	}

  }

  /**
    |---------------------------
    | Node class to this trie
    | @desc: Has Letter and pointers
    |---------------------------
    */
  class TrieNode
  {

  	// Properties
  	public $letter;
  	public $pointers = array();

  	// Constructor
  	public function __construct($initLetter)
  	{
  		$this->letter = $initLetter;
  	}

  }

  /**
    |---------------------------
    | Run the Method
    | @desc: Creates a trie, loads wordlist
    |---------------------------
    */
  public function index()
  {
      // Create the trie
      $eng_trie = new Trie();

     // Load the word list
      $word_list = file('http://www.sil.org/linguistics/wordlists/english/wordlist/wordsEn.txt', FILE_IGNORE_NEW_LINES);
      foreach ($word_list as $cur_word)
      {
          $eng_trie->addWord($cur_word);
      }
  }
?>
