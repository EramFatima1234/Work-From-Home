<?php
   class grandpa{
      public function __construct(){
         echo "I am in grandpa class"."<br>";
      }
      }
   class papa extends grandpa{
      public function __construct(){
         parent::__construct();
         echo "I am in papa class";
      }
   }
$obj = new papa();
?>