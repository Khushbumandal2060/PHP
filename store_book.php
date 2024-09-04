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

    $success = "";
    // If there are no errors, proceed to insert the record
    if (empty($error)) {
        try {
            $connection = new mysqli('localhost', 'root', '', 'projects');

            // Check connection
            if ($connection->connect_error) {
                throw new Exception("Connection failed: " . $connection->connect_error);
            }

            // Prepare insert statement
            $sql = "INSERT INTO tbl_book (id, title, publisher, author, edition, no_of_page, price, publish_date, isbn) 
                    VALUES ('$id', '$title', '$publisher', '$author', '$edition', '$no_of_page', '$price', '$publish_date', '$isbn')";

            // Execute insert statement
            if ($connection->query($sql) === TRUE) {
                $success = 'Book added successfully.';
            } else {
                throw new Exception('Failed to add book: ' . $connection->error);
            }

        } catch (Exception $th) {
            $error['db'] = 'Error: ' . $th->getMessage();
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
    <title>Add Book</title>
    <style>
        .success, .error {
            border-radius: 5px;
            margin: 20px 0;
            padding: 10px;
            text-align: center;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            font-weight: bold;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <form action="#" method="POST" name="book_form">
        <h1>Add Book</h1>
        <?php if (!empty($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo implode('<br>', $error); ?></div>
        <?php endif; ?>
        <div class="field-group">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>">
            <p><?php echo isset($error['id']) ? $error['id'] : ''; ?></p>
        </div>

        <div class="field-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>">
            <p><?php echo isset($error['title']) ? $error['title'] : ''; ?></p>
        </div>

        <div class="field-group">
            <label for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher" value="<?php echo isset($_POST['publisher']) ? $_POST['publisher'] : ''; ?>">
            <p><?php echo isset($error['publisher']) ? $error['publisher'] : ''; ?></p>
        </div>

        <div class="field-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo isset($_POST['author']) ? $_POST['author'] : ''; ?>">
            <p><?php echo isset($error['author']) ? $error['author'] : ''; ?></p>
        </div>

        <div class="field-group">
            <label for="edition">Edition:</label>
            <input type="text" id="edition" name="edition" value="<?php echo isset($_POST['edition']) ? $_POST['edition'] : ''; ?>">
            <p><?php echo isset($error['edition']) ? $error['edition'] : ''; ?></p>
        </div>

        <div class="field-group">
            <label for="no_of_page">Number of Pages:</label>
            <input type="number" id="no_of_page" name="no_of_page" value="<?php echo isset($_POST['no_of_page']) ? $_POST['no_of_page'] : ''; ?>">
            <p><?php echo isset($error['no_of_page']) ? $error['no_of_page'] : ''; ?></p>
        </div>

        <div class="field-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>">
            <p><?php echo isset($error['price']) ? $error['price'] : ''; ?></p>
        </div>

        <div class="field-group">
            <label for="publish_date">Publish Date:</label>
            <input type="date" id="publish_date" name="publish_date" value="<?php echo isset($_POST['publish_date']) ? $_POST['publish_date'] : ''; ?>">
            <p><?php echo isset($error['publish_date']) ? $error['publish_date'] : ''; ?></p>
        </div>

        <div class="field-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" value="<?php echo isset($_POST['isbn']) ? $_POST['isbn'] : ''; ?>">
            <p><?php echo isset($error['isbn']) ? $error['isbn'] : ''; ?></p>
        </div>

        <button type="submit" name="submit">Add Book</button>
    </form>
</body>
</html>
