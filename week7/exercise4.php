<?php
class CircleArea {
    const PI = 3.14;
    
    private $radius;
    
    // Constructor calculates and displays area immediately
    public function __construct($radius) {
        $this->radius = $radius;
        $this->calculateArea();
    }
    
    // Destructor
    public function __destruct() {
        echo "Circle with radius {$this->radius} is being destroyed.\n";
    }
    
    private function calculateArea() {
        $area = self::PI * ($this->radius ** 2);
        echo "Area of circle with radius {$this->radius} is: " . round($area, 2) . "\n";
    }
}


$r = new CircleArea(5);

unset($r);
?>