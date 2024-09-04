<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header('Location: auth.php');
    exit;
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: auth.php');
    setcookie('email', '', time() - 3600, "/");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }
        .logout button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .logout button:hover {
            background-color: #d32f2f;
        }
        .dashboard-buttons {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 15px;
        }
        .dashboard-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: block;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .dashboard-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span>
            <h1> Welcome </h1>
            <p><?php echo $_SESSION['email']; ?></p>
            </span>
            <div class="logout">
                <form method="get" action="">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>
        <div class="dashboard-buttons">
            <a href="name.php" class="dashboard-button">Name</a>
            <a href="calculator.php" class="dashboard-button">Calculator</a>
            <a href="registrations.php" class="dashboard-button">Registrations</a>
            <a href="simple_interest.php" class="dashboard-button">Simple Interest</a>
            <a href="interest_calculator.php" class="dashboard-button">Interest Calculator</a>
            <a href="student_registration.php" class="dashboard-button">Student Registration</a>
            <a href="store_book.php" class="dashboard-button">Store Book</a>
            <a href="Book_info.php" class="dashboard-button">Search Books</a>
            <a href="modify.php" class="dashboard-button">Modify Books</a>
            <a href="neplease_incometax.php" class="dashboard-button">Nepalese Income Tax</a>
        </div>
    </div>
</body>
</html>
 