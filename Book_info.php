<?php
$search_result = "";
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['remove'])) {
        $book_id = $_POST['book_id'];
        try {
            $connection = new mysqli('localhost', 'root', '', 'projects');
            if ($connection->connect_error) {
                throw new Exception("Connection failed: " . $connection->connect_error);
            }

            $book_id = $connection->real_escape_string($book_id);
            $sql = "DELETE FROM tbl_book WHERE id = '$book_id'";

            if ($connection->query($sql) === TRUE) {
                $search_result = '<div class="success">Book removed successfully.</div>';
            } else {
                throw new Exception("Error removing book: " . $connection->error);
            }

        } catch (Exception $th) {
            $error['db'] = 'Error: ' . $th->getMessage();
        }
    } else {
        if (empty($_POST['search_query'])) {
            $error['search_query'] = 'Search query is required.';
        } else {
            $search_query = $_POST['search_query'];
        }

        if (empty($error)) {
            try {
                $connection = new mysqli('localhost', 'root', '', 'projects');
                if ($connection->connect_error) {
                    throw new Exception("Connection failed: " . $connection->connect_error);
                }

                $search_query = $connection->real_escape_string($search_query);
                $sql = "SELECT * FROM tbl_book WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%' OR id LIKE '%$search_query%' OR publisher LIKE '%$search_query%' OR isbn LIKE '%$search_query%'";

                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    $search_result = '<div class="success">Book(s) found:</div>';
                    $search_result .= '<div class="book-container">';
                    while ($row = $result->fetch_assoc()) {
                        $search_result .= "<div class='book-info'>
                            <p><strong>ID:</strong> " . $row['id'] . "</p>
                            <p><strong>Title:</strong> " . $row['title'] . "</p>
                            <p><strong>Publisher:</strong> " . $row['publisher'] . "</p>
                            <p><strong>Author:</strong> " . $row['author'] . "</p>
                            <p><strong>Edition:</strong> " . $row['edition'] . "</p>
                            <p><strong>Number of Pages:</strong> " . $row['no_of_page'] . "</p>
                            <p><strong>Price:</strong> $" . $row['price'] . "</p>
                            <p><strong>Publish Date:</strong> " . $row['publish_date'] . "</p>
                            <p><strong>ISBN:</strong> " . $row['isbn'] . "</p>
                            <form method='POST'class='btn' action='#'>
                                <input type='hidden' name='book_id' value='" . $row['id'] . "'>
                                <button type='submit' name='remove'>Remove</button>
                                <button type='button' onclick='location.href=\"modify.php?id=" . $row['id'] . "\"'>Modify</button>
                            </form>
                        </div>";
                    }
                    $search_result .= '</div>';
                } else {
                    $search_result = '<div class="error">No books found matching the search query.</div>';
                }
            } catch (Exception $th) {
                $error['db'] = 'Error: ' . $th->getMessage();
            }
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
    <title>Search Book</title>
    <style>
        .success, .error {
            border-radius: 5px;
            margin: 10px 0;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .book-container {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-between; */
        }
        .btn{
            max-width:200px;
        }
        .book-info {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
            width: 22%;
            box-sizing: border-box;
        }
        .book-info p {
            margin: 5px 0;
        }
        .search {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .field-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .book-info form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        .book-info form button {
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <form action="#" class='search' method="POST" name="search_form">
            <h1>Search Book</h1>
            <div class="field-group">
                <label for="search_query">Search Query:</label>
                <input type="text" id="search_query" name="search_query" value="<?php echo isset($_POST['search_query']) ? $_POST['search_query'] : ''; ?>">
                <p><?php echo isset($error['search_query']) ? $error['search_query'] : ''; ?></p>
            </div>
            <button type="submit" name="submit">Search</button>
        </form>
    </div>
    <div class="result-container">
        <?php
        if (!empty($search_result)) {
            echo $search_result;
        }
        ?>
    </div>
</body>
</html>
