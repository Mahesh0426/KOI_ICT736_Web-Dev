<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDb";

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert data
    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    // Insert a row
    $firstname = "Jane";
    $lastname = "Smith";
    $email = "jane.smith@example.com";
    $stmt->execute();

    echo "New record created successfully<br>";

    // Select and display data
    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, reg_date FROM MyGuests");
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row) {
        echo "ID: " . $row["id"] . " | Name: " . $row["firstname"] . " " . $row["lastname"] . " | Email: " . $row["email"] . " | Registered: " . $row["reg_date"] . "<br>";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>
