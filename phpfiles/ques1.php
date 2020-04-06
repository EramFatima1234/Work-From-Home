<?php

//array_map
function cube($n)
{
    return ($n * $n * $n);
}

//$a = [1, 2, 3, 4, 5]; 
$a = array("a" => 2, "b" => 4, "c" => 5, "d" => 10);
$b = array_map('cube', $a);
print_r($b);

//array_walk
function myfunction($value, $key) 
{ 
    echo "The key $key has the value $value \n"; 
} 
array_walk($a, "myfunction"); //same array of array map


//array_filter
function Even($array) 
{ 
    // returns if the input integer is even 
    if($array%2==0) 
       return TRUE; 
    else 
       return FALSE;  //this callback function will also print zero and false element as false
} 
  
$array = array(12, 0, 0, 18, 27, 0, 46); 
print_r(array_filter($array, "Even")); 
?>

