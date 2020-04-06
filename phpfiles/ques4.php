<?php
//stripcslashes
echo stripcslashes("Hello, \my na\me is Ms Era\m.");
echo "\n"; 

//strcmp
// $str1 = "Welcome to Ground"; 
// $str2 = "Welcome to GrainGround"; 
// $str3 = "Welcome"; 
  
// // In this case both the strings are equal 
// print_r(strncmp($str1, $str3, 7)); 
// echo "\n"; 
  
// // In this case the first is greater 
// print_r(strncmp($str2, $str1, 14)); 
// echo "\n"; 
  
// // In this case the second is greater 
// print_r(strncmp($str3, $str2, 10)) 





//strpbrk
echo strpbrk("Geeks for Geeks!", "ef");  //eeks for Geeks!
echo strpbrk("A Computer Science portal", "tue"); //uter Science portal
echo strpbrk("A Computer Science portal", "c");  //cience portal

echo "<br>"; 

//strchr
$originalStr = "This is the line Eram has started";  
$searchStr = "Eram" ; //no ouput if they dont find word
  
// prints the string from the  
// first occurrence of the $searchStr 
echo strchr($originalStr, $searchStr);

echo "<br>"; 
//strpos
$string = "This is an example of strpos";  
$search2="exam";  
 $position = strrpos($string, $search2, 7);     
    if ($position == true){   
            echo "Found at position " . $position;   
 }   
    else{   
          echo "Search string is not found.";   
  }  

  echo "<br>"; 

//strspn
echo strspn("Eram Fatima is a student", "EramFatima "); 

echo "<br>"; 

//strtr
$string = "Ertm Ftaimt" ; 
$string1 = "ta";  
$string2 = "at"; 
  
// replacement is done  
echo strtr($string, $string1, $string2); //gives ouput Eram Fatima



//vsprintf
print vsprintf("%04d-%02d-%02d", explode('-', '1988-8-1'));

echo "<br>";
//wordwrap
// Input string 
$str = "the line will break soon"; 
  
// prints the wrapped string 
echo wordwrap($str, 3, "\n", TRUE);  
?>