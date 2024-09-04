<?php
$error = [];
$action_result = "";

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch book details from the database based on the ID
    try {
        $connection = new mysqli('localhost', 'root', '', 'projects');

        if ($connection->connect_error) {
            throw new Exception("Connection failed: " . $connection->connect_error);
        }

        $id = $connection->real_escape_string($id);
        $sql = "SELECT * FROM tbl_book WHERE id='$id'";
        $result = $connection->query($sql);

        if ($result->num_rows == 1) {
            $book = $result->fetch_assoc();
        } else {
            throw new Exception("Book not found.");
        }
    } catch (Exception $th) {
        $error['db'] = 'Error: ' . $th->getMessage();
    } 
}

// Handle form submission for book modification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $title = $_POST['title'] ?? null;
    $publisher = $_POST['publisher'] ?? null;
    $author = $_POST['author'] ?? null;
    $edition = $_POST['edition'] ?? null;
    $no_of_page = $_POST['no_of_page'] ?? null;
    $price = $_POST['price'] ?? null;
    $publish_date = $_POST['publish_date'] ?? null;
    $isbn = $_POST['isbn'] ?? null;

    if (empty($id) || empty($title) || empty($publisher) || empty($author) || empty($edition) || empty($no_of_page) || empty($price) || empty($publish_date) || empty($isbn)) {
        $error['form'] = 'All fields are required for modification.';
    } else {
        try {
            $connection = new mysqli('localhost', 'root', '', 'projects');

            if ($connection->connect_error) {
                throw new Exception("Connection failed: " . $connection->connect_error);
            }

            $id = $connection->real_escape_string($id);
            $title = $connection->real_escape_string($title);
            $publisher = $connection->real_escape_string($publisher);
            $author = $connection->real_escape_string($author);
            $edition = $connection->real_escape_string($edition);
            $no_of_page = $connection->real_escape_string($no_of_page);
            $price = $connection->real_escape_string($price);
            $publish_date = $connection->real_escape_string($publish_date);
            $isbn = $connection->real_escape_string($isbn);

            $sql = "UPDATE tbl_book 
                    SET title='$title', publisher='$publisher', author='$author', 
                        edition='$edition', no_of_page='$no_of_page', price='$price', 
                        publish_date='$publish_date', isbn='$isbn' 
                    WHERE id='$id'";
            $connection->query($sql);

            if ($connection->affected_rows == 1) {
                $action_result = '<div class="success">Book updated successfully.</div>';
            } else {
                $action_result = '<div class="error">Failed to update book. Make sure the ID exists.</div>';
            }
        } catch (Exception $th) {
            $action_result = '<div class="error">Error: ' . $th->getMessage() . '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modify.css">
    <title>Modify Book</title>
</head>
<body>
    <form action="#" method="POST" name="modify_book_form">
        <h1>Modify Book</h1>
        <?php
        if (!empty($action_result)) {
            echo $action_result;
        }
        ?>
        <input type="hidden" name="id" value="<?php echo isset($book['id']) ? $book['id'] : ''; ?>">
        <div class="field-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo isset($book['title']) ? $book['title'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher" value="<?php echo isset($book['publisher']) ? $book['publisher'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo isset($book['author']) ? $book['author'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="edition">Edition:</label>
            <input type="text" id="edition" name="edition" value="<?php echo isset($book['edition']) ? $book['edition'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="no_of_page">Number of Pages:</label>
            <input type="number" id="no_of_page" name="no_of_page" value="<?php echo isset($book['no_of_page']) ? $book['no_of_page'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo isset($book['price']) ? $book['price'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="publish_date">Publish Date:</label>
            <input type="date" id="publish_date" name="publish_date" value="<?php echo isset($book['publish_date']) ? $book['publish_date'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="<?php echo isset($book['isbn']) ? $book['isbn'] : ''; ?>">
        </div>
        <div class="field-group">
            <button type="submit">Update Book</button>
        </div>
        <p><?php echo isset($error['form']) ? $error['form'] : ''; ?></p>
    </form>
</body>
</html>
