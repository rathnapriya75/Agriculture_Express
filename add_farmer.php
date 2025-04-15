<?php
include 'db.php'; // Include database connection

$message = ""; // To store success or error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $farmer_name = $_POST['farmer_name'];
    $farming_type = $_POST['farming_type'];
    $location = $_POST['location'];
    $contact_number = $_POST['contact_number'];

    // Insert data into the `farmers` table
    $sql = "INSERT INTO farmers (farmer_name, farming_type, location, contact_number) 
            VALUES ('$farmer_name', '$farming_type', '$location', '$contact_number')";

    if ($conn->query($sql) === TRUE) {
        $message = "Farmer added successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <title>Add Farmer</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #ffd6a5;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #caffbf;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    <div class="container">
        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h2>Add Farmer</h2>
        <form action="add_farmer.php" method="POST">
            <label for="farmer_name">Farmer Name:</label>
            <input type="text" name="farmer_name" id="farmer_name" required>

            <label for="farming_type">Farming Type:</label>
            <input type="text" name="farming_type" id="farming_type" required>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>

            <label for="contact_number">Contact Number:</label>
            <input type="tel" name="contact_number" id="contact_number" pattern="[0-9]{10}" required 
                   title="Please enter a 10-digit phone number.">

            <button type="submit">Add Farmer</button>
        </form>
    </div>
</body>

</html>
