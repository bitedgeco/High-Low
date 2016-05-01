<?php 

$guesses = 0;
$again = 'yes';

if ($argc == 3){
	$minInput = $argv[1];
	$maxInput = $argv[2];
} else {
	$minInput = 'this should promt user for min';
	$maxInput = 'this should promt user for min';
}

while (!is_numeric($minInput) || !is_numeric($maxInput) || $minInput > $maxInput){
	echo "Please enter a minimum number\n";
	$minInput = trim(fgets(STDIN));
	while (!is_numeric($minInput)){
		echo "Please enter a minimum number\n";
		$minInput = trim(fgets(STDIN));
	}
	echo "Please enter a max number greater than {$minInput}\n";
	$maxInput = trim(fgets(STDIN));
	while (!is_numeric($maxInput) || $maxInput < $minInput){
		echo "Please enter a max number greater than {$minInput}\n";
		$maxInput = trim(fgets(STDIN));
	} 
}

$number = mt_rand($minInput, $maxInput);
echo "Guess a number between {$minInput} and {$maxInput}.\n";
echo "Hint the nunber is {$number}\n";

do {
	$guess = trim(fgets(STDIN));
	$numeric = is_numeric($guess);
	$guesses++;
	if ($guess >= $minInput && $guess <= $maxInput && $numeric) {
		if ($number > $guess) {
			echo "higher\n";
		} elseif ($number < $guess) {
			echo "lower\n";
		} elseif ($number == $guess) {
			echo "Winner winner chicken dinner! That took {$guesses} guesses.\n";
			echo "Enter \"yes\" if you would you like to play again.\n";
			$again = trim(fgets(STDIN));
			if ($again == 'yes'){
				$guesses = 0;
				$number = mt_rand($minInput, $maxInput);
				echo "Guess a number between {$minInput} and {$maxInput}.\n";
				echo "Hint the nunber is {$number}\n";
			} else {
				echo "Goodby\n";
			}
		}
	} else {
		echo "That is not a number between {$minInput} and {$maxInput}\n";
	}
} while ($again == 'yes');



