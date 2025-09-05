<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "websecurity";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // ✅ Secure prepared statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "✅ Logged in successfully (safe)!";
    } else {
        echo "❌ Invalid login.";
    }
    $stmt->close();
}
$conn->close();
?>
