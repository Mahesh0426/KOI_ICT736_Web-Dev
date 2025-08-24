<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ""; // To store feedback

// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "Office");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $address = $_POST['address'];
    $position = $_POST['position'];

    // Insert data safely using prepared statement
    $stmt = $conn->prepare("INSERT INTO employee (firstname, lastname, address, position) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first, $last, $address, $position);

    if ($stmt->execute()) {
        $message = "Thank you! Information entered.";
        // Clear form fields
        $first = $last = $address = $position = "";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<html>
<body>
<h2>Employee Form</h2>

<?php
if ($message != "") {
    echo "<p style='color:green; font-weight:bold;'>$message</p>";
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    First name: <input type="text" name="first" value="<?php echo isset($first) ? $first : ''; ?>" required><br>
    Last name: <input type="text" name="last" value="<?php echo isset($last) ? $last : ''; ?>" required><br>
    Address: <input type="text" name="address" value="<?php echo isset($address) ? $address : ''; ?>" required><br>
    Position: <input type="text" name="position" value="<?php echo isset($position) ? $position : ''; ?>" required><br>
    <input type="submit" name="submit" value="Enter information">
</form>

<hr>
<h2>All Employees</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Position</th>
        <th>Registered At</th>
    </tr>
<?php
// Fetch all employee records
$result = $conn->query("SELECT * FROM employee ORDER BY id ASC");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['address']}</td>
                <td>{$row['position']}</td>
                
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found.</td></tr>";
}
$conn->close();
?>
</table>
</body>
</html>
