<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Interest Calculator</title>
    <link rel="stylesheet" href="simple.css">
    
</head>
<body>
    <div class="container">
        <h1>Simple Interest</h1>
        <form method="GET">
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
        if (isset($_GET['submit'])) {
            $principal = $_GET['principal'];
            $rate = $_GET['rate'];
            $time = $_GET['time'];

            if (is_numeric($principal) && is_numeric($rate) && is_numeric($time)) {
                $simple_interest = ($principal * $rate * $time) / 100;
                $total_amount = $principal + $simple_interest;
                echo "<div class='result'>";
                echo "<p>Interest: " . $simple_interest . "</p>";
                echo "<p>Total Plus Interest: " . $total_amount . "</p>";
                echo "</div>";
            } else {
                echo "<p>Please enter valid numeric values.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
