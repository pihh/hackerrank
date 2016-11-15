<?php
/**
|---------------------------
| Best solution 2thanks netta333
| @desc: Create a dictinary on PHP and find how many child words it has
 *
| @explanation:

|-------
*/

}

class Node {
    public $left;
    public $right;
    public $data;

    public function __construct($v) {
        $this->data = $v;
    }
}

function add($contact, &$node) {
    if (!$node) {
        $node = new Node($contact);
        return;
    }
    if ($contact < $node->data)
        add($contact, $node->left);
    else
        add($contact, $node->right);
}

//returns count
function findPartial($contact, $node) {
    if (!$node)
        return 0;
    $count = 0;
    $prefix = substr($node->data, 0, strlen($contact));
    if ($prefix==$contact)
        $count++;
    if ($contact <= $prefix) {
        $count += findPartial($contact, $node->left);
    }
    if ($contact >= $prefix)
        $count += findPartial($contact, $node->right);
    return $count;
}

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);

$d = null; //dictionary BST root node
for($a0 = 0; $a0 < $n; $a0++){
    fscanf($handle,"%s %s",$op,$contact);
    if ($op=="add")
        add($contact, $d);
    elseif ($op=="find") {
        $count = findPartial($contact, $d);
        echo "$count\n";
    } else
        return;
}

/**
|---------------------------
| Second attempt
| @desc: Create a dictinary on PHP and find how many child words it has
| @author: Pihh - https://github.com/pihh
 *
| @explanation:
    On my first attempt I created a Trie by the book, but unfortunatly it seems that
    PHP uses a lot of memory when using classes ( a lot more than I expected ), and I
    used a class that stores an array of nodes ( by the book as said ), well that was
    giving me runtime exceptions on input 2,3,4,5,7,8,9,10,12,13

    As I found strange that I had so many exceptions, I decided to store it in a
    single array and see if it runned better, in fact it did, so only exercise 5 and
    11 where failing.

    So, after some attempts using SplFixedArray and some other stuff I came with
    adding more memory ( wich seemed to me as cheating ) but it worked.

    Next time I'll try to have 2 0 indexed arrays on where I'll store name and count,
    that way I'll save memory onkeys and see if I can remove the memory_limit cheat
|---------------------------
 */



ini_set('memory_limit', '256M');
$dictionary = [];

$add = function($word) use (&$dictionary){
    if(!isset($dictionary[$word])){
    $arr = str_split($word);
    $n = count($arr);
    $str = '';

    for($i = 0; $i < $n ; $i++){
        $str .= $arr[$i];
	   if(!isset($dictionary[$str])){
			$dictionary[$str] = 1;
		}else{
			$dictionary[$str]++;
       }
	}
    }
};

$find = function($word) use(&$dictionary){
    $count = 0;

    if(isset($dictionary[$word]))
       $count = $dictionary[$word];

    return $count;
};

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
for($a0 = 0; $a0 < $n; $a0++){
    if(fscanf($handle,"%s %s",$op,$contact)){
        if(trim($op) == 'add'){
		  $add($contact);
	   }
	   if(trim($op) == 'find'){
		  print($find($contact)."\r\n");
	   }
    }

}

?>

/*

// OLD ATTEMPT
error_reporting(0);

Class Trie{
    private static $word;
	private static $arr = [] ;
	private static $template = [
		'_isWord' => false,
		'_childWords' => 1
	];
    private static $maxLen = 20;

	public function __construct(){

	}

    public static function cleanWord($word){
        if($word != ''){
		  $word = preg_replace('/\s+/', '', $word);
          $word = substr($word, 0 , self::$maxLen);
        }
        self::$word = $word;
        return;
    }

	public static function add($word){
		self::cleanWord($word);
		$node = &self::$arr;

        $arr = str_split(self::$word);
        $str = '';

        $n = count($arr);

        for($i = 0; $i < $n ; $i++){
            $str .= $arr[$i];
			if(!isset($node[$str])){
				$node[$str] = 1;
			}else{
				$node[$str]++;
			}
		}

        return ;
	}

	public static function find($word, $i = 0 , $array = false){
		self::cleanWord($word);
        $count = 0;

        if(isset(self::$arr[self::$word]))
            $count = self::$arr[self::$word];

        return $count;
    }

}
$trie = new Trie();

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
for($a0 = 0; $a0 < $n; $a0++){
    fscanf($handle,"%s %s",$op,$contact);
    if(trim($op) == 'add'){
		$trie::add(trim($contact));
	}
	if(trim($op) == 'find'){
		print($trie::find($contact)."\r\n");
	}
}
*/

?>
