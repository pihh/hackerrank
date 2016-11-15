<?php

    //Binary tree where the childs are allways greater than the parent
    //Manual

    class BinaryHeap
    {
        protected $heap;

        public function __construct() {
            $this->heap  = array();
        }

        public function isEmpty() {
            return empty($this->heap);
        }

        public function count() {
            // returns the heapsize
            return count($this->heap) - 1;
        }

        public function extract() {
            if ($this->isEmpty()) {
                throw new RunTimeException('Heap is empty');
            }

            // extract the root item
            $root = array_shift($this->heap);

            if (!$this->isEmpty()) {
                // move last item into the root so the heap is
                // no longer disjointed
                $last = array_pop($this->heap);
                array_unshift($this->heap, $last);

                // transform semiheap to heap
                $this->adjust(0);
            }

            return $root;
        }

        public function compare($item1, $item2) {
            if ($item1 === $item2) {
                return 0;
            }
            // reverse the comparison to change to a MinHeap!
            return ($item1 > $item2 ? 1 : -1);
        }

        protected function isLeaf($node) {
            // there will always be 2n + 1 nodes in the
            // sub-heap
            return ((2 * $node) + 1) > $this->count();
        }

        protected function adjust($root) {
            // we've gone as far as we can down the tree if
            // root is a leaf
            if (!$this->isLeaf($root)) {
                $left  = (2 * $root) + 1; // left child
                $right = (2 * $root) + 2; // right child

                // if root is less than either of its children
                $h = $this->heap;
                if (
                  (isset($h[$left]) &&
                    $this->compare($h[$root], $h[$left]) < 0)
                  || (isset($h[$right]) &&
                    $this->compare($h[$root], $h[$right]) < 0)
                ) {
                    // find the larger child
                    if (isset($h[$left]) && isset($h[$right])) {
                      $j = ($this->compare($h[$left], $h[$right]) >= 0)
                          ? $left : $right;
                    }
                    else if (isset($h[$left])) {
                      $j = $left; // left child only
                    }
                    else {
                      $j = $right; // right child only
                    }

                    // swap places with root
                    list($this->heap[$root], $this->heap[$j]) = 
                      array($this->heap[$j], $this->heap[$root]);

                    // recursively adjust semiheap rooted at new
                    // node j
                    $this->adjust($j);
                }
            }
        }
        public function insert($item) {
            // insert new items at the bottom of the heap
            $this->heap[] = $item;

            // trickle up to the correct location
            $place = $this->count();
            $parent = floor($place / 2);
            // while not at root and greater than parent
            while (
              $place > 0 && $this->compare(
                $this->heap[$place], $this->heap[$parent]) >= 0
            ) {
                // swap places
                list($this->heap[$place], $this->heap[$parent]) =
                    array($this->heap[$parent], $this->heap[$place]);
                $place = $parent;
                $parent = floor($place / 2);
            }
        }
    }

    //SPL
    $heap = new splheap();
    $max_heap = new splmaxheap();
    $min_heap = new splminheap();
   /**
    |---------------------------
    | Methods:
    |   + count() ->    Compare elements in order to place them correctly in the heap while sifting up.              
    |   + compare() ->  Counts the number of elements in the heap.
    |   + current() ->  Return current node pointed by the iterator
    |   + extract() ->  Extracts a node from top of the heap and sift up.
    |   + insert() ->   Inserts an element in the heap by sifting it up.
    |   + isempty() ->  Checks whether the heap is empty.
    |   + key() ->      Return current node index
    |   + next() ->     Move to the next node. This will delete the top node of the heap.
    |   + recoverFromCorruption() ->    Recover from the corrupted state and allow further actions on the heap.
    |   + rewind() ->   Rewind iterator back to the start (no-op)
    |   + top() ->      Peeks at the node from the top of the heap
    |   + valid() ->    Check whether the heap contains more nodes
    |---------------------------
    */

        



