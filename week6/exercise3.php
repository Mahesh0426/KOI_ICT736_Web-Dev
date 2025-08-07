<!DOCTYPE html>
<html>
<head>
  <title>Simple PHP Calculator</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #f0f0f0;
      font-family: Arial, sans-serif;
    }
    .card {
      background: white;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 300px;
    }
    h1 {
      margin-bottom: 20px;
      font-size: 22px;
    }
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      width: 48%;
      padding: 10px;
      margin: 5px 1%;
      border: none;
      background-color: #007bff;
      color: white;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    .result {
      margin-top: 20px;
      font-size: 18px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="card">
    <h1>Simple Calculator</h1>
    <form method="post" action="">
      <input type="number" name="num1" placeholder="Enter first number" required>
      <input type="number" name="num2" placeholder="Enter second number" required><br>
      
      <input type="submit" name="operation" value="Add">
      <input type="submit" name="operation" value="Subtract"><br>
      <input type="submit" name="operation" value="Multiply">
      <input type="submit" name="operation" value="Divide">
    </form>

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operation = $_POST["operation"];
        echo "<div class='result'>";
        switch ($operation) {
          case "Add":
            echo "$num1 + $num2 = " . ($num1 + $num2);
            break;
          case "Subtract":
            echo "$num1 - $num2 = " . ($num1 - $num2);
            break;
          case "Multiply":
            echo "$num1 × $num2 = " . ($num1 * $num2);
            break;
          case "Divide":
            if ($num2 == 0) {
              echo "Cannot divide by zero.";
            } else {
              echo "$num1 ÷ $num2 = " . ($num1 / $num2);
            }
            break;
          default:
            echo "Invalid operation.";
        }
        echo "</div>";
      }
    ?>
  </div>

</body>
</html>
