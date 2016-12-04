<?php
$_fp = fopen("php://stdin", "r");
fscanf($_fp,"%d %d",$n,$q);
$last_ans = 0;
$list = array();

for($i=0; $i<$q; $i++){
    fscanf($_fp,"%d %d %d",$command,$x,$y);
    $seq = ($x ^ $last_ans)%$n;
    
    if($command == 1)
        $list[$seq][]=$y;
    else{
        $ind = $y%count($list[$seq]);
        $last_ans = $list[$seq][$ind];
        print($last_ans."\n");
    }
}
?>
