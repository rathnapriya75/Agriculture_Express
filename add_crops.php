<?php
include_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("INSERT INTO crops (name, description, price, image_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $image_url);
    $stmt->execute();

    header("Location: crops.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Crop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffd6a5;
            color: black;
            font-weight: bolder;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #caffbf;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
    font-size: 40px;
    color: black; 
    text-decoration: none;
    font-weight: bold;
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
        .crop-image {
            width: 100px;
            height: 100px;
            object-fit: cover; /* Ensures consistent size without distortion */
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Add Crop</h2>
    <form method="POST">
        <div class="form-group">
            <label for="name">Crop Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="image_url">Image URL</label>
            <input type="url" class="form-control" id="image_url" name="image_url" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Crop</button>
    </form>
</div>

</body>
</html>
