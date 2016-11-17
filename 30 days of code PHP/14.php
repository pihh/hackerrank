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

        function insert($head,$data){
           // IF null -> this is the first node
           if(NULL == $head){
               $head = new Node($data);
               // if head->next has a null pointer, means that we are pointin to the beginning -> second node
           }elseif(NULL == $head->next){
               $head->next = new Node($data);
           }else{
               // head is allways a node ( the node pointing to the next ) so insert this data in the node this data is pointin
               $this->insert($head->next,$data);
           }

           // Return pointer
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


?>
