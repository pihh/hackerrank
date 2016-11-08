<?php

Class Trie{
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
		$n = count($arr);

		$node = &self::$arr;

		for($i = 0; $i < $n ; $i++){
			if(!isset($node[$arr[$i]])){
				$node[$arr[$i]] = self::$template;
			}else{
				$node[$arr[$i]]['_childWords']++;
				if($i == $n -1 && isset($node[$arr[$i]])){
					$node[$arr[$i]]['_isWord'] = true;
				}
			}
			$node = &$node[$arr[$i]];
		}
	}

	public static function find($word, $i = 0 , $array = false){
		if($word != ''){
						$word = preg_replace('/\s+/', '', $word);
		if(!$array){
			$array = self::$arr;
		}

		$letter = substr($word, $i, 1);
		if (isset($array[$letter])) {
			if ($i == strlen($word) - 1) {
				return $array[$letter];
			} else if ($i < strlen($word)) {
				return self::find($word, $i + 1, $array[$letter]);
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

$trie = new Trie();
$string = '';
// $handle = fopen ("php://stdin","r");
$handle = fopen('tries/input2.txt','r');
$output = file_get_contents('tries/output2.txt');
fscanf($handle,"%d",$n);
for($a0 = 0; $a0 < $n; $a0++){
	fscanf($handle,"%s %s",$op,$contact);
	if(trim($op) == 'add'){
		$trie::add(trim($contact));
	}
	if(trim($op) == 'find'){
		$string .= $trie::countChild($contact)."\r\n";
	}
}
$string = trim($string);
print($string);

var_dump($string == $output);
var_dump(trim($string) == $output);
