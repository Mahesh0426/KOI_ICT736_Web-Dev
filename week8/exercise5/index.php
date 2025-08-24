<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM employees");
$employees = $stmt->fetchAll();
?>

<h2>Employee List</h2>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Department</th><th>Salary</th><th>Actions</th>
</tr>

<?php foreach ($employees as $emp): ?>
<tr>
    <td><?= $emp['id'] ?></td>
    <td><?= $emp['name'] ?></td>
    <td><?= $emp['email'] ?></td>
    <td><?= $emp['department'] ?></td>
    <td><?= $emp['salary'] ?></td>
    <td>
        <a href="update.php?id=<?= $emp['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $emp['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<br>
<a href="create.php">Add New Employee</a>
