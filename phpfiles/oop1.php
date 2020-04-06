<?php

interface Shape
{
    public function calcArea();
}
class Circle implements Shape
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    // calcArea calculates the area of circles
    public function calcArea()
    {
        return $this->radius * $this->radius * pi();
    }
}
class Rectangle implements Shape
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    // calcArea calculates the area of rectangles
    public function calcArea()
    {
        return $this->width * $this->height;
    }
}
$circ = new Circle(3);
echo 'Area of Circle with Radius 3 : ' . $circ->calcArea();
$rect = new Rectangle(3, 4);
echo '<br>Area of Rectangle with Sides 3,4 : ' . $rect->calcArea();
