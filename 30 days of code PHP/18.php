
<?php
class Solution {
    // Write your code here
    private $stack;
    private $queue;

    public function __construct(){
        $this->stack = new SplStack();
        $this->queue = new SplQueue();
    }

    public function pushCharacter($char){
        $this->stack->push($char);
    }

    public function enqueueCharacter($char){
        $this->queue->enqueue($char);
    }

    public function popCharacter(){
        return $this->stack->pop();
    }

    public function dequeueCharacter(){
        return $this->queue->dequeue();
    }
}
