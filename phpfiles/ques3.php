<?php

//krsort
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
krsort($fruits);
foreach ($fruits as $key => $val) {
    echo "$key = $val\n";
}

//natsort
  
// input array 
$arr1 = array("12.jpeg", "10.jpeg", "2.jpeg", "1.jpeg"); 
$arr2 = $arr1; 
  
// sorting using sort function. 
sort($arr1); 
  
// printing sorted element. 
echo "Standard sorting\n"; 
print_r($arr1); 
  
// sorting using natsort() function. 
natsort($arr2); 
  
// printing sorted element. 
echo "\nNatural order sorting\n"; 
print_r($arr2); 

//uasort
function sorting($a,$b) 
{ 
    if ($a==$b) return 0; 
        return ($a<$b)?-1:1; 
} 
  
// input array   
$arr=array("a"=>4,"b"=>2,"g"=>8,"d"=>6,"e"=>1,"f"=>9); 
$arr1=array("a"=>4,"b"=>2,"g"=>8,"d"=>6,"e"=>1,"f"=>9); 
  
uasort($arr,"sorting");   //uasort
uksort($arr1, "sorting");  //uksort
  
// printing sorted array. 
print_r($arr); 
print_r($arr1);
  
?> 
?>