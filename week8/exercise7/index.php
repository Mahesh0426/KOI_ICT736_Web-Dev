<?php
session_start();
include 'config.php';

$message = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from database where username AND password match
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['username'] = $username;

        // Optional: Set cookie for 1 day
        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + 86400, "/");
        }

        header("Location: welcome.php");
        exit;
    } else {
        $message = "Incorrect username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form method="post" action="">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Remember Me: <input type="checkbox" name="remember"><br><br>
    <input type="submit" name="login" value="Login">
</form>
<p>username: testuser</p>
<p>password: 123456</p>
<p style="color:red;"><?php echo $message; ?></p>
</body>
</html>
