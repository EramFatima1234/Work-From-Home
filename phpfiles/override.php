<?php
// function overriding

// This is parent class
class Parents
{

    // Function father of parent class
    public function father()
    {
        echo "Parents";
    }
}

// This is child class
class Child extends Parents
{

    // Overriding father method
    public function father()
    {
        echo "<br> Child";
    }
}

// Reference type of parent
$p = new Parents;

// Reference type of child
$c = new Child;

// print Parent
$p->father();

// Print child
$c->father();
