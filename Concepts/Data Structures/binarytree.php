<?php
namespace 'BinarySearchTree'

class SimpleNode{

}

class SimpleBinarySearchTree{

}


/**
 |http://phpden.info/binary-search-trees-in-php
 */

Class Node{
    public $value,$left,$right, $parent

    public function __construct($value, Node $parent = null)
    {
        $this->value = $value;
        $this->parent = $parent;
    }
    public function min()
    {
        $node = $this;
        while ($node->left) {
            if (!$node->left) {
                break;
            }
            $node = $node->left;
        }
        return $node;
    }

    public function max()
    {
        $node = $this;
        while ($node->right) {
            if (!$node->right) {
                break;
            }
            $node = $node->right;
        }
        return $node;
    }

    public function delete($value)
    {
        $node = $this->search($value);
        if ($node) {
            $node->delete();
        }
    }
}

Class Binary_Search_Tree{

    public $root;

    public function __construct($value = null)
    {
        if ($value !== null) {
            $this->root = new Node($value);
        }
    }

    public function search($value)
    {
        $node = $this->root;

        while($node) {
            if ($value > $node->value) {
                $node = $node->right;
            } elseif ($value < $node->value) {
                $node = $node->left;
            } else {
                break;
            }
        }

        return $node;
    }

/**
OK, so what's going on here? Every time we go right or left we check to see if
the branch is null before proceeding and based on that information we make a
decision to either attach a new node to the branch and break from the loop, or
move to the next node. So insertion happens just before the point where we would
normally end up with null and break from the loop, but since we can't attach a
node to null, we attach just before the $node is assigned null, and then break.
*/
    public function insert($value)
    {
        $node = $this->root;
        if (!$node) {
            return $this->root = new Node($value);
        }

        while($node) {
            if ($value > $node->value) {
                if ($node->right) {
                    $node = $node->right;
                } else {
                    $node = $node->right = new Node($value, $node);
                    break;
                }
            } elseif ($value < $node->value) {
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node = $node->left = new Node($value, $node);
                    break;
                }
            } else {
                break;
            }
        }
        return $node;
    }
    /**
     | Calls the node Min function
     | @return; Node Min
     */
    public function min()
    {
        if (!$this->root) {
            throw new Exception('Tree root is empty!');
        }

        $node = $this->root;
        return $node->min();
    }

    public function max()
    {
        if (!$this->root) {
            throw new Exception('Tree root is empty!');
        }

        $node = $this->root;
        return $node->max();
    }

    public function delete()
    {
        if ($this->left && $this->right) {
            $min = $this->right->min();
            $this->value = $min->value;
            $min->delete();
        } elseif ($this->right) {
            if ($this->parent->left === $this) {
                $this->parent->left = $this->right;
                $this->right->parent = $this->parent->left;
            } elseif ($this->parent->right === $this) {
                $this->parent->right = $this->right;
                $this->right->parent = $this->parent->right;
            }
            $this->parent = null;
            $this->right   = null;
        } elseif ($this->left) {
            if ($this->parent->left === $this) {
                $this->parent->left = $this->left;
                $this->left->parent = $this->parent->left;
            } elseif ($this->parent->right === $this) {
                $this->parent->right = $this->left;
                $this->left->parent = $this->parent->right;
            }
            $this->parent = null;
            $this->left   = null;
        } else {
            if ($this->parent->right === $this) {
                $this->parent->right = null;
            } elseif ($this->parent->left === $this) {
                $this->parent->left = null;
            }
            $this->parent = null;
        }
    }


    public function walk(Node $node = null)
    {
        if (!$node) {
            $node = $this->root;
        }
        if (!$node) {
            return false;
        }
        if ($node->left) {
            yield from $this->walk($node->left);
        }
        yield $node;
        if ($node->right) {
            yield from $this->walk($node->right);
        }
    }

    // ORDER Transversal

    /*
    LEVEL ORDER (BFS)
    A level-order traversal of tree  is a recursive algorithm that processes the
     root, followed by the children of the root (from left to right), followed
     by the grandchildren of the root (from left to right), etc. The basic
     algorithm shown below uses a queue of references to binary
     trees to keep track of the subtrees at each level:

      Input:  3,5,4,7,2,1
      Output: 3 2 5 1 4 7
      Tree:        3
               2        5
            1   *    4    7
    */
    public function levelOrder($root){

       if($root) $queue = [$root];
           while($queue){
            $node = array_shift($queue);
            echo $node->data, ' ';
            if($node->left) $queue[] = $node->left;
            if($node->right) $queue[] = $node->right;
        }

    }

    /*
    PRE ORDER
    A preorder traversal of tree  is a recursive algorithm that processes the
    root and then performs preorder traversals of the left and right subtrees.
    The elements are processed root-left-right order. The basic algorithm is as
    follows:

      Input:  3,5,4,7,2,1
      Output: TODO
      Tree:        3
               2        5
            1   *    4    7
    */
    public function PreOrder($root){

        if(null !== $root) {
                //process t's root element
                $this->PreOrder( $root->left );
                $this->PreOrder( $root->right );
        }
    }


    /*
    PostOrder Traversal
    A postorder traversal of tree  is a recursive algorithm that follows the left
    and right subtrees before processing the root element. The elements are
    processed in left-right-root order. The basic algorithm is as follows:

      Input:  3,5,4,7,2,1
      Output: TODO
      Tree:        3
               2        5
            1   *    4    7
    */
    public function PostOrder($root){

        if(null !== $root) {

                $this->PostOrder( $root->left );
                $this->PostOrder( $root->right );
                //process t's root element
        }
    }
    /*
    InOrder Traversal
    An inorder traversal of tree  is a recursive algorithm that follows the left
    subtree; once there are no more left subtrees to process, we process the right
    subtree. The elements are processed in left-root-right order. The basic
    algorithm is as follows:
*/

    public function inOrder($root){

        if(null !== $root) {

                $this->inOrder( $root->left );
                //process t's root element
                $this->inOrder( $root->right );

        }
    }
}
