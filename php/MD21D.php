/*
Write a function that accepts a multi-dimensional container of any size and converts it into a one dimensional 
associative array whose keys are strings representing their value's path in the original container.
*/

<?php
	$input = array
	(
		"one"=>array
		(
			"two"=>array
			(
				3
			),
			"four"=>array
			(
				5,
				6,
				7
			)
		),
		"eight"=>array
		(
			"nine"=>array
			(
				"ten"=>array
				(
					11
				)
			)
		)
	);
	
	
	function MD21D($arr, &$output, $add_char='') {
		$add_char = $add_char ? $add_char . '/' : '';
		foreach($arr as $k => $value) 
		{ 
			$key =  $add_char . $k;
			
			if(is_array($value)) 
				MD21D($value, $output, $key);
			else 
				$output[$key] = $value;
		}
	}

	$output = array();
	MD21D($input, $output);
	echo '<pre>'; print_r($output); echo '</pre>';




?>
