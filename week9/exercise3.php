<?php
//1. Matches 0 to 8 non-space characters
$regex1 = '/^\S{0,8}$/';

//2. Simple password expression (8–16 characters long)
$regex2 = '/^.{8,16}$/';

//3. Password with at least one letter and at least one number
$regex3 = '/^(?=.*[A-Za-z])(?=.*\d).+$/';

//4. Month and year in format mm/yyyy
$regex4 = '/^(0[1-9]|1[0-2])\/\d{4}$/';

//5. URL validation (basic)
$regex5 = '/^(https?:\/\/)[\w-]+\.[\w.-]+\/?$/';



$regex = "/^(0[1-9]|1[0-2])\/\d{4}$/"; // Example for mm/yyyy
$test = "08/2025";

if (preg_match($regex, $test)) {
    echo "Valid";
} else {
    echo "Invalid";
}
?>
