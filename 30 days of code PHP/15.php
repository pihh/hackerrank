<?php
class Node{
    public $data;
    public $next;
    function __construct($d)
    {
        $this->data = $d;
        $this->next = NULL;
    }
}
class Solution{

    private $node= NULL;


    function insert($head,$data){
       if(NULL == $head){
           $head = new Node($data);
       }elseif(NULL == $head->next){
           $head->next = new Node($data);
       }else{
           $this->insert($head->next,$data);
       }


       return $head;

    }


    function display($head){
            $start=$head;
            while($start){
                echo $start->data,' ';
                $start=$start->next;
            }
        }
}
$T=intval(fgets(STDIN));
$head=null;
$mylist=new Solution();
while($T-->0){
    $data=intval(fgets(STDIN));
    $head=$mylist->insert($head,$data);
}
$mylist->display($head);
?>
