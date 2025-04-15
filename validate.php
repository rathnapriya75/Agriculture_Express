<?php
include_once('db.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    $stmt = $conn->prepare("SELECT * FROM adminlogin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: adminpage.php");
        exit;
    } else {
        echo "<script language='javascript'>";
        echo "alert('Wrong Username or Password! Please try again.');";
        echo "window.location.href='login.php';";
        echo "</script>";
    }

    $stmt->close();
}
$conn->close();
?>
