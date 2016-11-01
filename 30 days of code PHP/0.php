<h1>Day 0: Hello, World.</h1>
<p>100%</p>

<?php
	
	$_fp = fopen("php://stdin", "r");

	$inputString = fgets($_fp); // get a line of input from stdin and save it to our variable

	// Your first line of output goes here
	print("Hello, World.\n$inputString");

	// Write the second line of output

	fclose($_fp);
?>

?>