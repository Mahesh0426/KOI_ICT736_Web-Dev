<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "test";  
// $port = 3307; 

// MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed (MySQLi): " . $conn->connect_error);
}
echo "✅ Connected successfully (MySQLi)";

// PDO connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br>✅ Connected successfully (PDO)";
} catch (PDOException $e) {
    echo "<br>❌ Connection failed (PDO): " . $e->getMessage();
}
?>
