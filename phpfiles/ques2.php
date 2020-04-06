<?php
//array_intersect_key
$array1 = array('A'  => 1, 'B'  => 2, 'C'  => 3, 'D' => 4);
$array2 = array('C' => 5, 'D' => 6, 'E' => 7, 'F'   => 8);

var_dump(array_intersect_key($array1, $array2));   

//array_intersect_uassoc
$array1 = array("a" => "APPLE", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "GREEN", "B" => "brown", "yellow", "red");

print_r(array_intersect_uassoc($array1, $array2, "strcasecmp"));

//array_product 

$a = array(2, 4, 6, 8);
echo "product(a) = " . array_product($a) . "\n";
echo "product(array()) = " . array_product(array()) . "\n"; //product of empty array = 1

//compact

$city  = "New Delhi";
$state = "Punjab";
$event = "Music";

$location_vars = array("city", "state");

$result = compact("event", $location_vars);
print_r($result);

//extract function
// input array 
$state = array("AS"=>"ASSAM", "OR"=>"ORRISA", "KR"=>"KERELA"); 
      
extract($state); 
  
// after using extract() function 
echo"\$AS is $AS  \n  \$KR is $KR   \n   \$OR is $OR"; 

//array_pad
function Padding($array, $string) 
{ 
    $result = array_pad($array, 10, $string); //we can also use -10 for printing values at initial
    return($result); 
} 
  
$array = array("one", "two", "three", "four", "five"); 
$string = "six"; 
print_r(Padding($array, $string)); 


//array splice

  
$array3 = array("10"=>"raghav", "20"=>"ram",  
    "30"=>"laxman","40"=>"aakash","50"=>"ravi"); 
  
$array4 = array("60"=>"ankita","70"=>"antara"); 
  
echo "The returned array: \n"; 
print_r(array_splice($array3, 1, 4, $array4)); 
  
echo "\nThe original array is modified to: \n"; 
print_r($array3); 
  


?>



