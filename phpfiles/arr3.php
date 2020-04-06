<?php 
// PHP prgoram to merge two objects 

class Teacher { 
	// Empty class 
} 

$objectA = new Teacher(); 
$objectA->a = 1; 
$objectA->b = 2; 
$objectA->d = 3; 

$objectB = new Teacher(); 
$objectB->d = 4; 
$objectB->e = 5; 
$objectB->f = 6; 

// Function to convert class of given object 
function convertObjectClass($array, $final_class) { 
	return unserialize(sprintf( 
		'O:%d:"%s"%s', 
		strlen($final_class), 
		$final_class, 
		strstr(serialize($array), ':') 
	)); 
} 

$obj_merged = convertObjectClass(array_merge( 
		(array) $objectA, (array) $objectB), 'Teacher'); 

print_r($obj_merged); 

?> 
