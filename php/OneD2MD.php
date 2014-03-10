/*
Write a function that accepts a one dimensional container of any size and converts it into a multi dimensional 
associative array whose keys are strings representing their value's path in the original container.
*/
<?php
	
	$input = Array (
		"one/two/0" => 3 ,
		"one/four/0" => 5 ,
		"one/four/1" => 6 ,
		"one/four/2" => 7 ,
		"eight/nine/ten/0" => 11
	);
	
	function OneD2MD(&$a, $Add_2_Array, $value) {
		if(!is_array($Add_2_Array))
			$Add_2_Array = explode($Add_2_Array[0], substr($Add_2_Array, 1));
		
		$key = array_pop($Add_2_Array);
		foreach($Add_2_Array as $k) {
			if(!isset($a[$k]))
				$a[$k] = array();
			$a = &$a[$k];
		}
		
		$a[$key ? $key : count($a)] = $value;
	}
	
	$output = array();
	$temp=array_keys($input);
	$a=array_values($input);
	for ($i = 0; $i < sizeof($temp); $i++) 
		OneD2MD($output, "/".$temp[$i], $a[$i]);

	echo '<pre>'; print_r($output); echo '</pre>';

?>
