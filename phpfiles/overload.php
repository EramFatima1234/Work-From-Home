<?php
// overloading in PHP

// Creating a class of type shape
class shape
{

    // __call is magic function which accepts function name and arguments
    
    public function __call($fn_name, $arguments)
    {

        // It will match the function name
        if ($fn_name == 'area') {

            switch (count($arguments)) {

                // If there is only one argument
                // area of circle
                case 1:
                    return 3.14 * $arguments[0];

                // IF two arguments then area is rectangel;
                case 2:
                    return $arguments[0] * $arguments[1];
            }
        }
    }
}

// Declaring a shape type object
$s = new Shape;

// Functio call
echo "Area of Circle having one argument radius : ".($s->area(2));
echo "<br>";

// calling area method for rectangel
echo "Area of Rectangle having two arguments : ".($s->area(4, 2));
