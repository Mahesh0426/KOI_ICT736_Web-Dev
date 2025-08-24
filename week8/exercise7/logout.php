<?php
session_start();

// Remove all session variables
session_unset();

// Destroy the session
session_destroy();

// Remove cookie
setcookie('username', '', time() - 3600, "/");

header("Location: index.php");
exit;
?>
