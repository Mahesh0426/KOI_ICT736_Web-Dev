<?php
// Function to calculate inverse
function calculateInverse($num) {
    if ($num == 0) {
        // Throw exception if user enters 0
        throw new Exception("Division by zero is not allowed");
    }
    return 1 / $num;
}

// Initialize result and error message
$result = "";
$error = "";

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['number'];

    try {
        // Validate input is a number
        if (!is_numeric($input)) {
            throw new Exception("Please enter a valid number");
        }

        $result = calculateInverse($input);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inverse Calculator</title>
</head>
<body>
    <h2>Calculate Inverse (1/X)</h2>
    <form method="post">
        <label>Enter a number:</label>
        <input type="text" name="number" required>
        <button type="submit">OK</button>
    </form>

    <?php if ($result !== ""): ?>
        <p><strong>Inverse:</strong> <?php echo $result; ?></p>
    <?php endif; ?>

    <?php if ($error !== ""): ?>
        <p style="color:red;"><strong>Error:</strong> <?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
