<?php
include_once('db.php');

session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT COUNT(*) as total_users FROM users";
$result = $conn->query($sql);
$total_users = $result->fetch_assoc()['total_users'];

$farmer_sql = "SELECT COUNT(*) as total_farmers FROM farmers";
$farmer_result = $conn->query($farmer_sql);
$total_farmers = $farmer_result->fetch_assoc()['total_farmers'];

$crop_sql = "SELECT COUNT(*) as total_crops FROM crops";
$crop_result = $conn->query($crop_sql);
$total_crops = $crop_result->fetch_assoc()['total_crops'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #ffd6a5;
        }

        .dashboard {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            margin: 10px;
        }

        .card-header {
            background-color: #4CAF50;
            color: white;
        }

        .card-body {
            text-align: center;
        }

        .dashboard-card {
            width: 18rem;
        }

        .btn-custom {
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
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Admin Dashboard</h1>
            <form action="logout_admin.php" method="post">
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

        <div class="dashboard">
            <div class="card dashboard-card">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_users; ?></h5>
                    <a href="users.php" class="btn btn-custom">View Users</a>
                </div>
            </div>

            <div class="card dashboard-card">
                <div class="card-header">Total Farmers</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_farmers; ?></h5>
                    <a href="farmers.php" class="btn btn-custom">View Farmers</a>
                </div>
            </div>

            <div class="card dashboard-card">
                <div class="card-header">Total Crops</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $total_crops; ?></h5>
                    <a href="crops.php" class="btn btn-custom">View Crops</a>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="add_farmer.php" class="btn btn-primary">Add Farmer</a>
            <a href="add_crops.php" class="btn btn-primary">Add Crop</a>
            <a href="add_user.php" class="btn btn-primary">Add Users</a>
        </div>
    </div>
</body>
</html>
