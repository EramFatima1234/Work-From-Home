<?php
trait oldMan
{
    public function sayHi()
    {
        echo 'OldMan says Hola!';
    }
}

trait newMan
{
    public function sayHi()
    {
        echo 'newMan says Hello!';
    }
}

trait futureMan
{
    public function sayHi()
    {
        echo "FutureMan says Hello";
    }
}
class Human
{
    use oldMan, newMan, futureMan {
        futureMan::sayHi insteadof oldMan;
        newMan::sayHi insteadof futureMan;
    }

}

$human1 = new Human();
$human1->sayHi();
