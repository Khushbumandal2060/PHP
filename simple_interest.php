<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Interest Calculator</title>
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
            max-width: 400px;
            width: 100%;
            text-align: center;
            border: 10px solid #4b0082;
        }
        h1 {
            color: #000000;
            font-size: 24px;
            background-color: #ffffff; */
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #333;
            text-align: left;
        }
        input[type="text"] {
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
            background-color: #4b0082;
            color: white;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #3a006e;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffeb3b;
            color: #333;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Simple Interest</h1>
        <form method="POST">
            <label for="principal">Principal</label>
            <input type="text" id="principal" name="principal" placeholder="Enter the principal" required>
            <br />
            <label for="rate">Rate of Interest</label>
            <input type="text" id="rate" name="rate" placeholder="Enter the rate of interest" required>
            <br />
            <label for="time">Time</label>
            <input type="text" id="time" name="time" placeholder="Enter the time" required>
            <br />
            <button type="submit" name="submit">Calculate</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $principal = $_POST['principal'];
            $rate = $_POST['rate'];
            $time = $_POST['time'];

            if (is_numeric($principal) && is_numeric($rate) && is_numeric($time)) {
                $simple_interest = ($principal * $rate * $time) / 100;
                $total_amount = $principal + $simple_interest;
                echo "<div class='result'>";
                echo "<p>Interest: " . $simple_interest . "</p>";
                echo "<p>Total (Principal + Interest): " . $total_amount . "</p>";
                echo "</div>";
            } else {
                echo "<p>Please enter valid numeric values.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
