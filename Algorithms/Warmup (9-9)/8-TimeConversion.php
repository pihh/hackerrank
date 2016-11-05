<?php

	$handle = fopen ("php://stdin","r");
	fscanf($handle,"%s",$time);

	$time24 = Date('H:i:s' , strtotime($time));

	print($time24);

?>
