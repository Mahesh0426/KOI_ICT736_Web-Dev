<?php
// Show all errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test"; 
$port = 3307; 
$socket = "/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock";

// --- MySQLi connection ---
$conn = new mysqli($servername, $username, $password, $dbname, $port, $socket);

if ($conn->connect_error) {
    die("❌ Connection failed (MySQLi): " . $conn->connect_error);
}
echo "✅ Connected successfully (MySQL)";

// --- PDO connection ---
try {
    $pdo = new PDO(
        "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8mb4;unix_socket=$socket",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br>✅ Connected successfully (PDO)";
} catch (PDOException $e) {
    echo "<br>❌ Connection failed (PDO): " . $e->getMessage();
}

// Optional: Close MySQLi connection
$conn->close();
?>
