<?php
require 'db.php';

$id = $_GET['id'];

// Fetch employee data
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET name=?, email=?, department=?, salary=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $department, $salary, $id]);

    header("Location: index.php"); // redirect after update
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $emp['name'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $emp['email'] ?>" required><br>
    Department: <input type="text" name="department" value="<?= $emp['department'] ?>" required><br>
    Salary: <input type="number" name="salary" value="<?= $emp['salary'] ?>" step="0.01" required><br>
    <input type="submit" value="Update Employee">
</form>
