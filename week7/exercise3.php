<?php
// Parent class
class Car {
    protected $name;
    protected $year;

    // Constructor
    public function __construct($name) {
        $this->name = $name;
    }

    // Method to print details
    public function printDetails() {
        echo "Car Name: " . $this->name;
    }
}

// Child class
class Ford extends Car {
    private $country;

    // Constructor with additional parameter
    public function __construct($name, $country) {
        parent::__construct($name); 
        $this->country = $country;
    }

    // Override parent method
    public function printDetails() {
        echo "Car Name: " . $this->name . " - Country: " . $this->country;
    }
}

// Create instance of child class
$ford = new Ford("Ford", "USA");
$ford->printDetails();
?>