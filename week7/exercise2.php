<?php
class Car {
    // Properties  of the class
    private $name;
    private $year;

    // Constructor
    public function __construct($name, $year) {
        $this->name = $name;
        $this->year = $year;
        echo "Car object created: {$this->name} - {$this->year}\n";
    }

    // Destructor
    public function __destruct() {
        echo "Car object destroyed: {$this->name} - {$this->year}\n";
    }
}


$ford = new Car("Ford", 2021);


unset($ford);
?>