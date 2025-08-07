<!DOCTYPE html>
<html>
<head>
    <title>PHP - Calculate Electricity Bill</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 30px;
        }
        #page-wrap {
            width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        input[type="number"], input[type="submit"] {
            padding: 10px;
            width: 100%;
            margin: 10px 0;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<div id="page-wrap">
    <h1>PHP - Calculate Electricity Bill</h1>
    <form action="" method="post" id="quiz-form">
        <input type="number" name="units" id="units" placeholder="Please enter Units" required />
        <input type="submit" name="unit-submit" id="unit-submit" value="Submit" />
    </form>

    <?php
    if (isset($_POST['unit-submit'])) {
        $units = $_POST['units'];
        $bill = 0;

        if ($units <= 50) {
            $bill = $units * 3.50;
        } elseif ($units <= 150) {
            $bill = (50 * 3.50) + (($units - 50) * 4.00);
        } elseif ($units <= 250) {
            $bill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
        } else {
            $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
        }

        echo "<h3>Total Bill for $units units = <strong>AUD " . number_format($bill, 2) . "</strong></h3>";
    }
    ?>
</div>
</body>
</html>
