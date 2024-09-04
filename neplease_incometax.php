<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepalese Income Tax Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepalese Income Tax Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        select, input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            display: block;
            width: calc(100% - 22px);
            padding: 10px;
            margin: 20px 0;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result-card {
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nepalese Income Tax Calculator</h1>
        <form action="" method="POST">
            <label for="assessment_info">Assessment Info:</label>
            <select id="assessment_info" name="assessment_info">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="marital_status">Marital Status:</label>
            <select id="marital_status" name="marital_status">
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
            </select>
            <label for="monthly_salary">Monthly Salary:</label>
            <input type="number" id="monthly_salary" name="monthly_salary" required>
            <label for="annual_income">Annual Gross Salary:</label>
            <input type="number" id="annual_income" name="annual_income" required>
            <button type="submit" name="submit">Calculate Tax</button>
        </form>
        <?php
        function calculate_tax($assessment_info, $marital_status, $annual_income) {
            $tax = 0;
            $slabs = array();

            if ($marital_status == 'Married') {
                $slabs = array(
                    array(450000, 0.01),  
                    array(100000, 0.10), 
                    array(200000, 0.20),  
                    array(550000, 0.30), 
                    array(PHP_INT_MAX, 0.35) 
                );
            } else { 
                $slabs = array(
                    array(400000, 0.01),  
                    array(100000, 0.10),  
                    array(200000, 0.20),  
                    array(550000, 0.30), 
                    array(PHP_INT_MAX, 0.35) 
                );
            }

            foreach ($slabs as $slab) {
                $slab_limit = $slab[0];  
                $slab_rate = $slab[1];   
                if ($annual_income > $slab_limit) {
                    $tax += $slab_limit * $slab_rate;
                    $annual_income -= $slab_limit;
                } else {
                    $tax += $annual_income * $slab_rate;
                    break;
                }
            }

            if ($assessment_info == 'Female') {
                $tax *= 0.9;
            }

            return $tax; 
        }

        if (isset($_POST['submit'])) {
            $assessment_info = $_POST['assessment_info'];
            $marital_status = $_POST['marital_status'];
            $monthly_salary = floatval($_POST['monthly_salary']);
            $annual_income = floatval($_POST['annual_income']);

            $tax = calculate_tax($assessment_info, $marital_status, $annual_income);

            echo '<div class="result-card">The calculated tax is: ' . $tax . '</div>';
        }
        ?>
    </div>
</body>
</html>
50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        select, input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            display: block;
            width: calc(100% - 22px);
            padding: 10px;
            margin: 20px 0;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result-card {
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nepalese Income Tax Calculator</h1>
        <form action="" method="POST">
            <label for="assessment_info">Assessment Info:</label>
            <select id="assessment_info" name="assessment_info">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="marital_status">Marital Status:</label>
            <select id="marital_status" name="marital_status">
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
            </select>
            <label for="monthly_salary">Monthly Salary:</label>
            <input type="number" id="monthly_salary" name="monthly_salary" required>
            <label for="annual_income">Annual Gross Salary:</label>
            <input type="number" id="annual_income" name="annual_income" required>
            <button type="submit" name="submit">Calculate Tax</button>
        </form>
        <?php
        function calculate_tax($assessment_info, $marital_status, $annual_income) {
            $tax = 0;
            $slabs = array();

            if ($marital_status == 'Married') {
                $slabs = array(
                    array(450000, 0.01),  
                    array(100000, 0.10), 
                    array(200000, 0.20),  
                    array(550000, 0.30), 
                    array(PHP_INT_MAX, 0.35) 
                );
            } else { 
                $slabs = array(
                    array(400000, 0.01),  
                    array(100000, 0.10),  
                    array(200000, 0.20),  
                    array(550000, 0.30), 
                    array(PHP_INT_MAX, 0.35) 
                );
            }

            foreach ($slabs as $slab) {
                $slab_limit = $slab[0];  
                $slab_rate = $slab[1];   
                if ($annual_income > $slab_limit) {
                    $tax += $slab_limit * $slab_rate;
                    $annual_income -= $slab_limit;
                } else {
                    $tax += $annual_income * $slab_rate;
                    break;
                }
            }

            if ($assessment_info == 'Female') {
                $tax *= 0.9;
            }

            return $tax; 
        }

        if (isset($_POST['submit'])) {
            $assessment_info = $_POST['assessment_info'];
            $marital_status = $_POST['marital_status'];
            $monthly_salary = floatval($_POST['monthly_salary']);
            $annual_income = floatval($_POST['annual_income']);

            $tax = calculate_tax($assessment_info, $marital_status, $annual_income);

            echo '<div class="result-card">The calculated tax is: ' . $tax . '</div>';
        }
        ?>
    </div>
</body>
</html>
