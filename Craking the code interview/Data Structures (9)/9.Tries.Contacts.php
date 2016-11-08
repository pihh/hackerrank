<?php

Class Trie{
		private $arr = [] ;
		private $template = [
			'_isWord' => false,
			'_childWords' => 1
		];

		public function add($word){
            $word = preg_replace('/\s+/', '', $word);
			$arr = str_split($word);
			$n = count($arr);

			$node = &$this->arr;

			for($i = 0; $i < $n ; $i++){
				if(!isset($node[$arr[$i]])){
					$node[$arr[$i]] = $this->template;
				}else{
					$node[$arr[$i]]['_childWords']++;
					if($i == $n -1 && isset($node[$arr[$i]])){
						$node[$arr[$i]]['_isWord'] = true;
					}
				}
				$node = &$node[$arr[$i]];
			}
		}

		public function find($word, $i = 0 , $array = false){
            if($word != ''){
                			$word = preg_replace('/\s+/', '', $word);
			if(!$array){
				$array = $this->arr;
			}

			$letter = substr($word, $i, 1);
    		if (isset($array[$letter])) {
        		if ($i == strlen($word) - 1) {
            		return $array[$letter];
        		} else if ($i < strlen($word)) {
            		return $this->find($word, $i + 1, $array[$letter]);
        		}

    		}
    		return false;
            }




		}

		public function countChild($word){
			$_word = $this->find($word);
			if($this->find($word)){
                if(isset($_word['_childWords'])){
                    return intval($_word['_childWords']);
                }else{
                    return 0;
                }
            }

			return 0;

		}

		public function getTrie(){
			return var_export($this->arr);
		}
	}

$trie = new Trie();

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
for($a0 = 0; $a0 < $n; $a0++){
    fscanf($handle,"%s %s",$op,$contact);
    (trim($op) == 'add')?
        $trie->add(trim($contact)):
        print($trie->countChild(trim($contact))."\n");
}

?>
