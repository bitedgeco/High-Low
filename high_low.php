<?php 

$number = mt_rand(1, 100);
$guesses = 0;

echo "Guess a number between 0 and 100\n";

do { 
	$guess = trim(fgets(STDIN));
	$numeric = is_numeric($guess);
	$guesses++;
	if ($guess > 0 && $guess < 101 && $numeric) {
		if ($number > $guess) {
			echo "higher\n";
		} else {
			echo "lower\n";
		}
	} else {
		echo "that is not a number between 0 and 100\n";
	}
} 	while ($number != $guess);

echo "winner winner chicken dinner! That took {$guesses} guesses.\n";




