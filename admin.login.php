<?php
session_start(); 
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: adminpage.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('db.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminlogin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: adminpage.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Login</title>
</head>

<body>
    <form action="index.php" method="post">
        <div class="login-box">
            <div style="text-align: center; margin-bottom: 10px;">
                <i class="fas fa-user-shield" style="font-size: 48px; color: #4CAF50;"></i>
            </div>

            <h1>Admin Login</h1>

            <?php
            if (isset($error)) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
            ?>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="username" required>
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" required>
            </div>

            <input class="button" type="submit" name="login" value="Sign In">
        </div>
    </form>
</body>
</html>
