<?php 

$number = mt_rand(1, 100);
$guesses = 0;
$again = 'yes';

echo "Guess a number between 0 and 100.\n";
echo $number;

do {
	$guess = trim(fgets(STDIN));
	$numeric = is_numeric($guess);
	$guesses++;
		if ($guess > 0 && $guess < 101 && $numeric) {
			if ($number > $guess) {
				echo "higher\n";
			} elseif ($number < $guess) {
				echo "lower\n";
			} elseif ($number == $guess) {
				echo "winner winner chicken dinner! That took {$guesses} guesses.\n";
				echo "Enter \"yes\" if you would you like to play again.\n";
				$again = trim(fgets(STDIN));
				if ($again == 'yes'){
					echo "Guess a number between 0 and 100.\n";
				} else {
					echo "Goodby\n";
				}
			}
		} else {
			echo "that is not a number between 0 and 100\n";
		}
} 	while ($again == 'yes');



