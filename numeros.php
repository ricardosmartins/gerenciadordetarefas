<?php 
for($i = 1; $i <=100; $i++){
	$print = $i . "<br />";
	if($i % 3 == 0)
		$print = "Fizz <br />";
	if($i % 5 == 0)
		$print = "Buzz <br />";
	if($i % 3 == 0 && $i % 5 == 0)
		$print = "FizzBuzz <br />";
	
	echo $print;
}
?>