<?php
// Establish database connection
$connection = new mysqli('localhost', 'root', '', 'db_pkmc_khushi_web');

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Query to retrieve book data
$sql = "SELECT * FROM tbl_book";

// Execute query
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Information</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Book Information</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>Author</th>
            <th>Edition</th>
            <th>No. of Pages</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>ISBN</th>
        </tr>
        <?php
        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["title"]."</td>";
                echo "<td>".$row["publisher"]."</td>";
                echo "<td>".$row["author"]."</td>";
                echo "<td>".$row["edition"]."</td>";
                echo "<td>".$row["no_of_page"]."</td>";
                echo "<td>".$row["price"]."</td>";
                echo "<td>".$row["publish_date"]."</td>";
                echo "<td>".$row["isbn"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No books found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close connection
$connection->close();
?>


