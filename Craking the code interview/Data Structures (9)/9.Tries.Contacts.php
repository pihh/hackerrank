<?php


//Trie class
class Trie
{
    
    public $root;
    
	function __construct()
	{
		$this->root = new TrieNode('');
	}
	
	function addWord($word)
	{
		$wordArray = str_split($word);
		$this->root->addSuffix($wordArray);
	}
	
	function hasWord($word)
	{
		$wordArray = str_split($word);
		return $this->root->hasSuffix($wordArray);
	}
	
	function printStructure()
	{
		$this->root->printStructure(0);
	}
	
	function printWords()
	{
		$this->root->printWords('');
	}
}

class TrieNode
{
	function __construct($value){ 
        $this->value = $value; 
    }
	
	function addSuffix($suffixArray)
	{
		if(!empty($suffixArray))
		{
			$firstChar = $suffixArray[0];
			$remnant = array_slice($suffixArray, 1);
			
			$childNode = $this->getChild($firstChar);
			if(false === $childNode)
			{
				$childNode = $this->addChild($firstChar);
			}
			$childNode->addSuffix($remnant);
		}
		else
		{
			$this->finishesWord = true;
		}
	}
	
	function hasSuffix($suffixArray)
	{
		if(!empty($suffixArray))
		{
			$firstChar = $suffixArray[0];
			
			$childNode = $this->getChild($firstChar);
			if(false == $childNode)
			{
				return false;
			}	
			else
			{
				$remnant = array_slice($suffixArray, 1);
				return $childNode->hasSuffix($remnant);
			}
		}
		else 
		{
			return true;
		}
	}		
	
	function getChild($childString)
	{
		if(is_array($this->children))
		{
			foreach ($this->children as $child)
			{
				if($child->value === $childString)
				{
					return $child;
				}
			}
		}
		return false;
	}
	
	function addChild($childString)
	{
		if(is_array($this->children))
		{
			foreach($this->children as $child)
			{
				if($child->value === $childString)
				{
					return $child;
				}
			}
		}
		
		$child = new TrieNode($childString);
		$this->children[] = $child;
		
		return $child;
	}
	
	function printStructure($level)
	{
		for($i=0; $i<$level; $i++)
		{
			echo ".";
		}
		echo $this->value.'<br/>';
		if(is_array($this->children))
		{
			foreach($this->children as $child)
			{
				$child->printStructure($level + 1);
			}
		}
	}
	
	function printWords($prefix)
	{
		if($this->finishesWord)
		{
			echo $prefix.$this->value.'<br/>';
		}
		
		if(is_array($this->children))
		{
			foreach($this->children as $child)
			{
				$child->printWords($prefix.$this->value);
			}
		}
	}
}


// Define operations && trie
$operations = array(
    'add',
    'find'
);

$trie = new Trie();


// Handle Stream
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
for($a0 = 0; $a0 < $n; $a0++){
    fscanf($handle,"%s %s",$op,$contact);
    
    ($op == $operations[0])? 
        $trie->addWord($contact):
        $trie->printWords($contact);
}



