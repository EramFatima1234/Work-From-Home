<?php
   class grandpa{
      public function __construct(){
         echo "I am in Grandpa class but calling it in papa class";
      }
   }
   class papa extends grandpa{
   }
   $obj = new papa();
?>