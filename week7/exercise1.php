<?php
class Car {
    // Properties of the class
    private $name;
    private $year;

    // Setter for name 
    public function set_name($name) {
        $this->name = $name;
    }

    // Getter for name
    public function get_name() {
        return $this->name;
    }

    // Setter for year
    public function set_year($year) {
        $this->year = $year;
    }

    // Getter for year
    public function get_year() {
        return $this->year;
    }
}


$ford = new Car();


$ford->set_name("Ford");
$ford->set_year(2021);



echo $ford->get_name() . " - " . $ford->get_year();
?>