<?php
//   function __autoload($class_name) {
//       require_once ($class_name . '.php');
//   }
   
//   $a = new test();
//   $b = new image();


  function __autoload($class_name) {
    if(file_exists($class_name . '.php')) {
        require_once($class_name . '.php');    
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}
 
try {
    $a = new test();
    $b = new image();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
?>