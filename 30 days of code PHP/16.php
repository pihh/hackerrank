<?php
/**
For some unknow reason exception not workng here ;

*/
$handle = fopen ("php://stdin","r");
fscanf($handle,"%s",$S);

$return = intval($S);

try {
    new ReflectionClass('ReflectionClass' . ((int)$S . "" !== $S));
    echo $S;
} catch (Exception $e) {
    echo "Bad String";
}


?>
