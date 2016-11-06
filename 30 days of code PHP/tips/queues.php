<?php


    //Manual
    class Queue
    {
        protected $stack;
        protected $limit;
        protected $description = 'It\'s a FIFO (first in first out) data structure. Data enters in the tail and leaves by the head.'

        public function __construct($limit = 10) {
            // initialize the stack
            $this->stack = array();
            // stack can only contain this many items
            $this->limit = $limit;
        }

        public function push($item) {
            // trap for stack overflow
            if (count($this->stack) < $this->limit) {
                // prepend item to the start of the array
                array_unshift($this->stack, $item);
            } else {
                throw new RunTimeException('Stack is full!'); 
            }
        }

        public function pop() {
            if ($this->isEmpty()) {
                // trap for stack underflow
              throw new RunTimeException('Stack is empty!');
          } else {
                // pop item from the start of the array
                return array_shift($this->stack);
            }
        }

        public function top() {
            return current($this->stack);
        }

        public function isEmpty() {
            return empty($this->stack);
        }
        
        public function describe(){
            print($this->description);
        }
    }

    // Non Manual
    $queue = new splqueue();
    $queue->enqueue(1);
    $queue->bottom(); // gets tail element -> last entered
    $queue->top();  // gets head element -> next to be removed
    if(!$queue->isEmpty()){ // throws exception dequeueing empty queue
        $queue->dequeue();    
    }
    //Loop
    $queue->setIteratorMode(
        SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP
    );
    foreach ($queue as $q) {
        echo $q . "\n";
    }


    