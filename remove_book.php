<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if ID is provided
    $error = [];
    if (empty($_POST['id'])) {
        $error['id'] = 'ID is required.';
    } else {
        $id = $_POST['id'];
    }

    // If there are no errors, proceed to delete the record
    if (empty($error)) {
        try {
            $connection = new mysqli('localhost', 'root', '', 'db_pkmc_2079_web');

            // Prepare delete statement
            $sql = "DELETE FROM tbl_book WHERE id='$id'";

            // Execute delete statement
            $connection->query($sql);

            if ($connection->affected_rows == 1) {
                echo 'Book removed successfully.';
            } else {
                echo 'Failed to remove book. Make sure the ID exists.';
            }
        } catch (Exception $th) {
            echo 'Error: ' . $th->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="remove.css">
    <title>Remove Book</title>
</head>
<body>
   
    <form action="#" method="POST" name="remove_book_form">
    <h1>Remove Book</h1>
        <div class="field-group">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>">
            <p><?php echo isset($error['id']) ? $error['id'] : ''; ?></p>
        </div>

        <button type="submit" name="submit">Remove Book</button>
    </form>
</body>
</html>



