<?php

//feof
$file = fopen("sample.txt", "r");

//Output lines until EOF is reached
while(! feof($file)) {
  $line = fgets($file);
  echo $line. "<br>";
}

fclose($file);

//fseek
// Opening a file 
$myfile = fopen("sample.txt", "w"); 
  
// reading first line 
fgets($myfile); 
  
// moving back to the beginning of the file 
echo fseek($myfile, 0); 
  
// closing the file 
fclose($myfile); 

echo filemtime("sample.txt"); 

?>