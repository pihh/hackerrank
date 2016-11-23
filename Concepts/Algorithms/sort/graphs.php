<?php
class Graph
{
  protected $graph;
  protected $visited = array();

  public function __construct($graph) {
    $this->graph = $graph;
  }

  public function deepFirstSearch(){
      
  }


  // find least number of hops (edges) between 2 nodes
  // (vertices)
  public function breadthFirstSearch($origin, $destination) {
    // mark all nodes as unvisited
    foreach ($this->graph as $vertex => $adj) {
      $this->visited[$vertex] = false;
    }

    // create an empty queue
    $q = new SplQueue();

    // enqueue the origin vertex and mark as visited
    $q->enqueue($origin);
    $this->visited[$origin] = true;

    // this is used to track the path back from each node
    $path = array();
    $path[$origin] = new SplDoublyLinkedList();
    $path[$origin]->setIteratorMode(
      SplDoublyLinkedList::IT_MODE_FIFO|SplDoublyLinkedList::IT_MODE_KEEP
    );

    $path[$origin]->push($origin);

    $found = false;
    // while queue is not empty and destination not found
    while (!$q->isEmpty() && $q->bottom() != $destination) {
      $t = $q->dequeue();

      if (!empty($this->graph[$t])) {
        // for each adjacent neighbor
        foreach ($this->graph[$t] as $vertex) {
          if (!$this->visited[$vertex]) {
            // if not yet visited, enqueue vertex and mark
            // as visited
            $q->enqueue($vertex);
            $this->visited[$vertex] = true;
            // add vertex to current path
            $path[$vertex] = clone $path[$t];
            $path[$vertex]->push($vertex);
          }
        }
      }
    }

    if (isset($path[$destination])) {
      echo "$origin to $destination in ",
        count($path[$destination]) - 1,
        " hopsn";
      $sep = '';
      foreach ($path[$destination] as $vertex) {
        echo $sep, $vertex;
        $sep = '->';
      }
      echo "n";
    }
    else {
      echo "No route from $origin to $destinationn";
    }
  }



  public function shortestPath($source, $target) {
  // array of best estimates of shortest path to each
  // vertex
  $d = array();
  // array of predecessors for each vertex
  $pi = array();
  // queue of all unoptimized vertices
  $Q = new SplPriorityQueue();

  foreach ($this->graph as $v => $adj) {
    $d[$v] = INF; // set initial distance to "infinity"
    $pi[$v] = null; // no known predecessors yet
    foreach ($adj as $w => $cost) {
      // use the edge cost as the priority
      $Q->insert($w, $cost);
    }
  }

  // initial distance at source is 0
  $d[$source] = 0;

  while (!$Q->isEmpty()) {
    // extract min cost
    $u = $Q->extract();
    if (!empty($this->graph[$u])) {
      // "relax" each adjacent vertex
      foreach ($this->graph[$u] as $v => $cost) {
        // alternate route length to adjacent neighbor
        $alt = $d[$u] + $cost;
        // if alternate route is shorter
        if ($alt < $d[$v]) {
          $d[$v] = $alt; // update minimum length to vertex
          $pi[$v] = $u;  // add neighbor to predecessors
                         //  for vertex
        }
      }
    }
  }

  // we can now find the shortest path using reverse
  // iteration
  $S = new SplStack(); // shortest path with a stack
  $u = $target;
  $dist = 0;
  // traverse from target to source
  while (isset($pi[$u]) && $pi[$u]) {
    $S->push($u);
    $dist += $this->graph[$u][$pi[$u]]; // add distance to predecessor
    $u = $pi[$u];
  }

  // stack will be empty if there is no route back
  if ($S->isEmpty()) {
    echo "No route from $source to $targetn";
  }
  else {
    // add the source node and print the path in reverse
    // (LIFO) order
    $S->push($source);
    echo "$dist:";
    $sep = '';
    foreach ($S as $v) {
      echo $sep, $v;
      $sep = '->';
    }
    echo "n";
  }



}

$graph = array(
  'A' => array('B', 'F'),
  'B' => array('A', 'D', 'E'),
  'C' => array('F'),
  'D' => array('B', 'E'),
  'E' => array('B', 'D', 'F'),
  'F' => array('A', 'E', 'C'),
);

$g = new Graph($graph);

// least number of hops between D and C
$g->breadthFirstSearch('D', 'C');
// outputs:
// D to C in 3 hops
// D->E->F->C

// least number of hops between B and F
$g->breadthFirstSearch('B', 'F');
// outputs:
// B to F in 2 hops
// B->A->F

// least number of hops between A and C
$g->breadthFirstSearch('A', 'C');
// outputs:
// A to C in 2 hops
// A->F->C

// least number of hops between A and G
$g->breadthFirstSearch('A', 'G');
// outputs:
// No route from A to G
