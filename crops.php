<?php
include_once('db.php');

$sql = "SELECT * FROM crops";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $crops = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $crops = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crops List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <style>
     body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffd6a5;
        }

        .container {
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 2px solid #3f5045;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }
 
        .logout-button {
            float: right;
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        .btn-custom {
            background-color: #4CAF50;
            color: white;
        }

        .btn-custom:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Crops List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($crops as $crop): ?>
            <tr>
                <td><?php echo htmlspecialchars($crop['id']); ?></td>
                <td><?php echo htmlspecialchars($crop['name']); ?></td>
                <td><?php echo htmlspecialchars($crop['description']); ?></td>
                <td><?php echo htmlspecialchars($crop['price']); ?></td>
                <td>
                    <?php if (!empty($crop['image_url'])): ?>
                        <img src="<?php echo htmlspecialchars($crop['image_url']); ?>" alt="Crop Image" style="width:150px; height:100px;">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mt-4">
            <a href="adminpage.php" class="btn btn-custom">Back to Dashboard</a>
        </div>
</div>
</body>
</html>
