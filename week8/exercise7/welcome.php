<?php
session_start();

// Check if user is logged in via session or cookie
if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
    header("Location: index.php");
    exit;
}

// Get username from session or cookie
$username = $_SESSION['username'] ?? $_COOKIE['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
<h2>Welcome, <?php echo $username; ?>!</h2>
<a href="logout.php">Logout</a>
</body>
</html>
