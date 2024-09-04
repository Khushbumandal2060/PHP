<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
            text-align: center;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #008CBA;
            color: white;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #007bb5;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffeb3b;
            color: #333;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="GET">
            <input type="text" name="num1" placeholder="Number 1" required>
            <br>
            <input type="text" name="num2" placeholder="Number 2" required>
            <br>
            <button type="submit" name="submit" value="Add">Add</button>
            <button type="submit" name="submit" value="Subtract">Subtract</button>
            <button type="submit" name="submit" value="Multiply">Multiply</button>
            <button type="submit" name="submit" value="Divide">Divide</button>
        </form>

        <?php
        if (isset($_GET['submit'])) {
            $num1 = $_GET['num1'];
            $num2 = $_GET['num2'];
            $operator = $_GET['submit'];
            
            // Validate and sanitize inputs
            if (is_numeric($num1) && is_numeric($num2)) {
                $num1 = floatval($num1);
                $num2 = floatval($num2);
                
                switch ($operator) {
                    case "Add":
                        $result = $num1 + $num2;
                        break;
                    case "Subtract":
                        $result = $num1 - $num2;
                        break;
                    case "Multiply":
                        $result = $num1 * $num2;
                        break;
                    case "Divide":
                        if ($num2 != 0) {
                            $result = $num1 / $num2;
                        } else {
                            $result = "Division by zero error!";
                        }
                        break;
                    default:
                        $result = "You need to select a valid operator";
                        break;
                }
                echo "<div class='result'>";
                echo "<p>The answer is: " . $result . "</p>";
                echo "</div>";
            } else {
                echo "<div class='result'>";
                echo "<p>Please enter valid numbers</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
