<?php
// Turn off error reporting
error_reporting(0);

echo "Testing error reporting...<br>";

// This variable is not defined, so it should cause a notice
echo $undefinedVar;

// This will cause a warning (division by zero)
echo 5 / 0;
?>
