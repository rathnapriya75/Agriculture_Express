<?php
include 'db.php';

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $gender = $_POST['gender'];

    // Checking if email already exists
    $checkEmailStmt = $conn->prepare("SELECT email FROM userdata WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if ($checkEmailStmt->num_rows > 0) {
        $message = "Email ID already exists";
        $toastClass = "background-color: #007bff";
    } else {
        $stmt = $conn->prepare("INSERT INTO userdata (username, email, password, userType, gender) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $email, $password, $userType, $gender);

        if ($stmt->execute()) {
            $message = "Account created successfully";
            $toastClass = "background-color: #28a745";
        } else {
            $message = "Error: " . $stmt->error;
            $toastClass = "background-color: #dc3545";
        }

        $stmt->close();
    }

    $checkEmailStmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Marketplace Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if ($message): ?>
            <div class="alert" style="<?php echo $toastClass; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h3 class="account-header">
            <i class="fa fa-user-circle"></i><br>
            Create Your Account
        </h3>

        <form method="post" class="form-control">
            <div>
                <label for="username">User Name</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-element">
                <label for="role">Register As:</label>
                <select id="role" name="userType" required>
                    <option value="">-- Select Role --</option>
                    <option value="farmer">Farmer</option>
                    <option value="buyer">Buyer</option>
                </select>
                <span class="error"></span>
            </div>

            <div class="form-element">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">-- Select Gender --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <span class="error"></span>
            </div>

            <div>
                <button type="submit">Create Account</button>
            </div>

            <div class="footer-text">
                <p>Already have an account? <a href="./login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
