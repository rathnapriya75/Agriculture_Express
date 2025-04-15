<?php
include 'db.php';

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        // Prepare and execute
        $stmt = $conn->prepare("UPDATE userdata SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $newPassword, $email);

        if ($stmt->execute()) {
            $message = "Password updated successfully";
            $toastClass = "bg-success";
        } else {
            $message = "Error updating password";
            $toastClass = "bg-danger";
        }

        $stmt->close();
    } else {
        $message = "Passwords do not match";
        $toastClass = "bg-warning";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Marketplace Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if ($message): ?>
            <div class="alert <?php echo $toastClass; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h3 class="account-header">
            <i class="fa fa-key"></i><br>
            Reset Your Password
        </h3>

        <form method="post" class="form-control">
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="newPassword">New Password</label>
                <input type="password" name="newPassword" id="newPassword" required>
            </div>

            <div>
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirmPassword" required>
            </div>

            <div>
                <button type="submit">Reset Password</button>
            </div>

            <div class="footer-text">
                <p>Remembered your password? <a href="./login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
