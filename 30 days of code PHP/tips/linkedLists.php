7<?php
    //Array with no indexes
    //Advanges: insertions and deletions are very fast
    //DisAavantages: Linear time ( has to loop each element to get to a point)

    //DoublyLinkedList -> Single linked list but links to the previous

    class Node(){
        
        public $next = new Node();
        public $current;
        public $data;
        
        public function __construct($data){
            $this->data = $data;
        }
        

    }

    class LinkedList(){
        
        public $head;
        public $current;
        
        public function append($data){
            if($this->head == null){
                $this->head = new Node($data);
                return;
            }else{
                $this.current = $this->head;
                while($this->current->next != null){
                    $this->current = $this->current->next;
                }
                $this->current->next = new Node($data);
                return;
            }

        }
        
        public function prepend($data){
            $newHead = new Node($data);
            $newHead->next = $this->head;
            $this->head = $newHead;
        }
        
        public function delete($data){
            if($null == $this->head){
                
            }else{
                $this->current = $this->head;
                while($this->current !== null){
                    if($this->next->data == $data){
                        $this->current->next = $this->current->next->next;
                        return;
                    }
                }
            }


        }
    }

?>