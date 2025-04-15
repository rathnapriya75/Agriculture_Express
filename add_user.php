<?php
include_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (username, email, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $role);
    $stmt->execute();

    header("Location: users.php"); 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
    <h2>Add User</h2>
    <form method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="" disabled selected>Select a role</option>
                <option value="farmer">Farmer</option>
                <option value="buyer">Buyer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Add User</button>
    </form>
</div>
</body>
</html>
