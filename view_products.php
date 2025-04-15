<?php
$conn = new mysqli('localhost', 'root', '', 'marketplace_agriculture');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <title>View Products</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #0f5132;
            color: black;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        h2 {
            background-color: #D6ED17FF;
            padding: 1%;
            border-radius: 35px;
        }
        table {
            background-color: #D6ED17FF;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 5px solid #606060FF;
            padding: 10px;
            color: black;
        }
        th {
            background-color: #D6ED17FF;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>View Products</h2>
    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['product_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['category']}</td>
                <td>{$row['price']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['description']}</td>
                <td><img src='{$row['image_url']}' alt='Product Image'></td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
