<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are provided
    $error = [];
    if (empty($_POST['id'])) {
        $error['id'] = 'ID is required.';
    } else {
        $id = $_POST['id'];
    }

    if (empty($_POST['title'])) {
        $error['title'] = 'Title is required.';
    } else {
        $title = $_POST['title'];
    }

    if (empty($_POST['publisher'])) {
        $error['publisher'] = 'Publisher is required.';
    } else {
        $publisher = $_POST['publisher'];
    }

    if (empty($_POST['author'])) {
        $error['author'] = 'Author is required.';
    } else {
        $author = $_POST['author'];
    }

    if (empty($_POST['edition'])) {
        $error['edition'] = 'Edition is required.';
    } else {
        $edition = $_POST['edition'];
    }

    if (empty($_POST['no_of_page'])) {
        $error['no_of_page'] = 'Number of Pages is required.';
    } else {
        $no_of_page = $_POST['no_of_page'];
    }

    if (empty($_POST['price'])) {
        $error['price'] = 'Price is required.';
    } else {
        $price = $_POST['price'];
    }

    if (empty($_POST['publish_date'])) {
        $error['publish_date'] = 'Publish Date is required.';
    } else {
        $publish_date = $_POST['publish_date'];
    }

    if (empty($_POST['isbn'])) {
        $error['isbn'] = 'ISBN is required.';
    } else {
        $isbn = $_POST['isbn'];
    }

    // If there are no errors, proceed to update the record
    if (empty($error)) {
        try {
            $connection = new mysqli('localhost', 'root', '', 'db_pkmc_2079_web');

            // Prepare update statement
            $sql = "UPDATE tbl_book 
                    SET title='$title', publisher='$publisher', author='$author', 
                        edition='$edition', no_of_page='$no_of_page', price='$price', 
                        publish_date='$publish_date', isbn='$isbn' 
                    WHERE id='$id'";

            // Execute update statement
            $connection->query($sql);

            if ($connection->affected_rows == 1) {
                echo 'Book updated successfully.';
            } else {
                echo 'Failed to update book.';
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
    <link rel="stylesheet" href="modify.css">
    <title>Modify Book</title>
</head>
<body>
    
    <form action="#" method="POST" name="book_form">
    <h1>Modify Book</h1>
        <div class="field-group">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>">
            <p><?php echo isset($error['id']) ? $error['id'] : ''; ?></p>
        </div>

        
        <div class="field-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="">
            <p><?php echo isset($error['title'])?$error['title']:'' ?></p>
            </div>

            <div class="field-group">
            <label for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher" value="">
            <p><?php echo isset($error['publisher'])?$error['publisher']:'' ?></p>
            </div>

            <div class="field-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="">
            <p><?php echo isset($error['author'])?$error['author']:'' ?></p>
            </div>

            <div class="field-group">
            <label for="edition">Edition:</label>
            <input type="text" id="edition" name="edition" value="">
            <p><?php echo isset($error['edition'])?$error['edition']:'' ?></p>
            </div>

            <div class="field-group">
            <label for="no_of_page">Number of Pages:</label>
            <input type="number" id="no_of_page" name="no_of_page" value="">
            <p><?php echo isset($error['no_of_page'])?$error['no_of_page']:'' ?></p>
            </div>

            <div class="field-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="">
            <p><?php echo isset($error['price'])?$error['price']:'' ?></p>
            </div>

            <div class="field-group">
            <label for="publish_date">Publish Date:</label>
            <input type="date" id="publish_date" name="publish_date" value="">
            <p><?php echo isset($error['publish_date'])?$error['publish_date']:'' ?></p>
            </div>

            <div class="field-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="">
            <p><?php echo isset($error['isbn'])?$error['isbn']:'' ?></p>
            </div>

        <button type="submit" name="submit">Update Book</button>
    </form>
</body>
</html>




