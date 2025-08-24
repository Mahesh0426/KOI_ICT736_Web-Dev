<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDb";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into table
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john.doe@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Select and display data
$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " | Name: " . $row["firstname"]. " " . $row["lastname"] . " | Email: " . $row["email"] . " | Registered: " . $row["reg_date"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
