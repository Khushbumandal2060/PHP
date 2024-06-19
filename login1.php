<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $error = []; 

    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $error['email'] = 'Email is required.';
    }

    if (isset($_POST['pwd']) && !empty($_POST['pwd']) && trim($_POST['pwd'])) {
        $pwd = $_POST['pwd'];
    } else {
        $error['pwd'] = 'Password is Required.';
    }

    if (count($error) == 0) { 
        try {
            $connection = new mysqli('localhost', 'root', '', 'db_pkmc_khushi_web');
            $sql = "SELECT * FROM tbl_register WHERE email='$email' AND password='$pwd'";
            $result = $connection->query($sql);
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                session_start();
                $_SESSION['user_data'] = $user;

                if (isset($_POST['remember'])) {
                    setcookie('email', $email, time() + (7 * 24 * 60 * 60));
                    setcookie('name', $user['name'], time() + (7 * 24 * 60 * 60));
                }
                if($connection->num_rows == 1){
                    echo 'Login success';
                }
                header('location: dashboard.php');
            } else {
                echo 'Login failed';
            }
        } catch (Exception $e) {
            die('Database Error: ' . $e->getMessage());
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form3.css" />
    <title>Login Form</title>
</head>
<body>
<form action="login.php" method="POST" name="login_form">
    <h1>Login Form</h1>

    <div class="field-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="">
        <p><?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
    </div>

    <div class="field-group">
        <label for="pwd">Password</label>
        <input type="password" id="pwd" name="pwd" value="">
        <p><?php echo isset($error['pwd']) ? $error['pwd'] : ''; ?></p>
    </div>

    <button type="submit" name="submit">Login</button>
    <p><?php echo isset($error['login']) ? $error['login'] : ''; ?></p>
</form>
</body>
</html>




<?php

header('location:login.php');
?>


