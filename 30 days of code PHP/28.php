<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$N);

$map = [];

for($a0 = 0; $a0 < $N; $a0++){
    fscanf($handle,"%s %s",$firstName,$emailID);
    if (strpos($emailID, '@gmail.com') !== false) {
        array_push($map,$firstName);
    }
}

asort($map);

print implode("\n",$map);

?>
