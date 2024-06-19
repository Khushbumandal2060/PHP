<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="calc.css">
</head>
<body>
    <div class="container">
        <form method="GET">
            <input type="text" name="num1" placeholder="Number1" required>
            <br><br>
            <input type="text" name="num2" placeholder="Number2" required>
            <br><br>
            <select name="operator" required>
                <option value="">Select</option>
                <option value="Add">Add</option>
                <option value="Subtraction">Subtraction</option>
                <option value="Multiply">Multiply</option>
                <option value="Division">Division</option>
            </select>
            <br><br>
            <button type="submit" name="submit">Calculate</button>
            <br>
            <p>The answer is: 
            <?php
            if (isset($_GET['submit'])) {
                $num1 = $_GET['num1'];
                $num2 = $_GET['num2'];
                $operator = $_GET['operator'];
                
                // Validate and sanitize inputs
                if (is_numeric($num1) && is_numeric($num2)) {
                    $num1 = floatval($num1);
                    $num2 = floatval($num2);
                    
                    switch ($operator) {
                        case "Add":
                            echo $num1 + $num2;
                            break;
                        case "Subtraction":
                            echo $num1 - $num2;
                            break;
                        case "Multiply":
                            echo $num1 * $num2;
                            break;
                        case "Division":
                            if ($num2 != 0) {
                                echo $num1 / $num2;
                            } else {
                                echo "Division by zero error!";
                            }
                            break;
                        default:
                            echo "You need to select a valid operator";
                            break;
                    }
                } else {
                    echo "Please enter valid numbers";
                }
            }
            ?>
            </p>
        </form>
    </div>
</body>
</html>
