. <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interest Calculator</title>
<link rel="stylesheet" href="1.css">
</head>
<body>
    <div class="form-container">
        <h1>Interest Calculator</h1>
        <form action="calculate.php" method="POST">
            <label for="principal">Principal</label>
            <input type="number" id="principal" name="principal" required>

            <label for="rate">Rate of Interest</label>
            <input type="number" id="rate" name="rate" step="0.01" required>

            <label for="time">Time</label>
            <input type="number" id="time" name="time" required>

            <button type="submit" name="submit" >Simple Interest</button>
            <button type="submit" name="submit" >Compound Interest</button>
        </form>
    
        <?php
if (isset($_POST['submit'])) {
    $principal = $_POST['principal'];
    $rate = $_POST['rate'];
    $time = $_POST['time'];

    if (is_numeric($principal) && is_numeric($rate) && is_numeric($time)) {
        $simple_interest = ($principal * $rate * $time) / 100;
        $compound_interest = $principal * pow((1 + $rate / 100), $time);
        $interest = $compound_interest - $principal;

        echo "<div class='result'>";
        echo "<p>Simple Interest: " . $simple_interest . "</p>";
        echo "<p>Compound Interest: " . $interest . "</p>";
        echo "</div>";
    } else {
        echo "<p>Please enter valid numeric values.</p>";
    }
}
?> 

   </div>
    </body>
</html>

