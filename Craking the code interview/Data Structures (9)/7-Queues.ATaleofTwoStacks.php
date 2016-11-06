<?php
    $_fp = fopen("php://stdin", "r");
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */

    $q = fscanf($handle,"%d,$q);
    $A = fgets($handle);
    
    
    fscanf($_fp,"%d",$q);
    $B = stream_get_contents($_fp,-1);
    $B = explode("\n",$B);

    $queue = new SplQueue();

    for($i = 0 ; $i < $q; $i++){
        $tmp = explode(' ',$B[$i]);
        switch($tmp[0]){
            case 1:
                
                $queue->enqueue($tmp[1]);
                break;
            case 2:
                if(!$queue->isEmpty()){
                    $queue->dequeue();    
                }
                break;
            case 3:
                print($queue->bottom()."\n");
        }
    }

?>