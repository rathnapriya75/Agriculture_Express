<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $farmer_id = $_POST['farmer_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $conn = new mysqli('localhost', 'root', '', 'marketplace_agriculture');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO products (farmer_id, name, category, price, quantity, description, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdiss", $farmer_id, $name, $category, $price, $quantity, $description, $image_url);

    if ($stmt->execute() === TRUE) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Add Product</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #0f5132;
            color: black;
            font-weight: bolder;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #D6ED17FF;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            background-color: #D6ED17FF;
            padding: 1%;
            border-radius: 35px;
        }
        label {
            display: block;
            margin: 10px 0;
            text-align: left;
        }
        input[type="text"],
        input[type="number"],
        input[type="url"],
        select,
        textarea,
        input[type="submit"] {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #606060FF;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #606060FF;
            color: #D6ED17FF;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #D6ED17FF;
            color: #606060FF;
        }
    </style>
</head>
<body>
    <h2>Add Product</h2>
    <form method="post" action="">
        <input type="hidden" name="farmer_id" value="1">

        <label for="name">Product Name:</label>
        <input type="text" name="name" required>

        <label for="category">Category:</label>
        <input type="text" name="category" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="image_url">Image URL:</label>
        <input type="url" name="image_url" placeholder="https://example.com/image.jpg" required>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
