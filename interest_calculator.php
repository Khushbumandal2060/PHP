<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interest Calculator</title>
    <link rel="stylesheet" href="1.css">
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
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[name="calculate"][value="simple"] {
            background-color: #4CAF50;
            color: white;
        }
        button[name="calculate"][value="simple"]:hover {
            background-color: #45a049;
        }
        button[name="calculate"][value="compound"] {
            background-color: #008CBA;
            color: white;
        }
        button[name="calculate"][value="compound"]:hover {
            background-color: #007bb5;
        }
        .result {
            margin-top: 60px;
            padding: 15px;
            background-color: #ffeb3b;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 400px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Interest Calculator</h1>
        <form action="" method="POST">
            <label for="principal">Principal</label>
            <input type="number" id="principal" name="principal" required>

            <label for="rate">Rate of Interest</label>
            <input type="number" id="rate" name="rate" step="0.01" required>

            <label for="time">Time</label>
            <input type="number" id="time" name="time" required>

            <button type="submit" name="calculate" value="simple">Simple Interest</button>
            <button type="submit" name="calculate" value="compound">Compound Interest</button>
        </form>
    
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $principal = $_POST['principal'];
            $rate = $_POST['rate'];
            $time = $_POST['time'];
            $calculation_type = $_POST['calculate'];

            if (is_numeric($principal) && is_numeric($rate) && is_numeric($time)) {
                if ($calculation_type == 'simple') {
                    $simple_interest = ($principal * $rate * $time) / 100;
                    $amount = $simple_interest + $principal;
                    
                    echo "<div class='result'>";
                    echo "<p>Simple Interest: " . $simple_interest . "</p>";
                    echo "<p>Amount: " . $amount . "</p>";
                    echo "</div>";
                } elseif ($calculation_type == 'compound') {
                    $compound_interest = $principal * pow((1 + $rate / 100), $time);
                    $interest = $compound_interest - $principal;
                    echo "<div class='result'>";
                    echo "<p>Compound Interest: " . $interest . "</p>";
                    echo "<p>Amount: " . $compound_interest . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Please enter valid numeric values.</p>";
            }
        }
        ?> 
    </div>
</body>
</html>
