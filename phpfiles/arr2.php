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
$objectB->e = 4; 
$objectB->f = 5; 
$objectB->g = 6; 

// Function to convert class of given object 
function convertObjectClass($objectA, 
				$objectB, $final_class) { 

	$new_object = new $final_class(); 

	// Initializing class properties 
	foreach($objectA as $property => $value) { 
		$new_object->$property = $value; 
	} 
	
	foreach($objectB as $property => $value) { 
		$new_object->$property = $value; 
	} 

	return $new_object; 
} 

$obj_merged = convertObjectClass($objectA, 
						$objectB, 'Teacher'); 
						
print_r($obj_merged); 

?> 
