<?php
// parent class
abstract class Fruit {
    protected $name;

    // Constructor
    public function __construct($name) {
        $this->name = $name;
    }

    // Abstract method
    abstract public function color();
}

//  1 st Child class 
class Apple extends Fruit {
    public function color() {
        echo $this->name . " is red\n";
    }
}

//  2nd Child class 
class Orange extends Fruit {
    public function color() {
        echo $this->name . " is orange\n";
    }
}

// 3rd Child class 3
class Grape extends Fruit {
    public function color() {
        echo $this->name . " is purple\n";
    }
}


$apple = new Apple("Apple");
$orange = new Orange("Orange");
$grape = new Grape("Grape");


$apple->color();
$orange->color();
$grape->color();
?>