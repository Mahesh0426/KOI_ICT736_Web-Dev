<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, email, department, salary) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $department, $salary]);

    // Redirect to index.php after adding employee
    header("Location: index.php");
    exit(); // important to stop further execution
}
?>

<h2>Add Employee</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Department: <input type="text" name="department" required><br>
    Salary: <input type="number" name="salary" step="0.01" required><br>
    <input type="submit" value="Add Employee">
</form>
