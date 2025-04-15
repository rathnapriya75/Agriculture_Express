<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $farmer_name = $_POST['farmer_name'];
    $crop_name = $_POST['crop_name'];
    $image = $_FILES['crop_image'];

    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $filename = basename($image['name']);
    $target_file = $target_dir . $filename;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png'];

    if (!in_array($imageFileType, $allowed_types)) {
        $error = "Only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk && move_uploaded_file($image["tmp_name"], $target_file)) {
        
        $analysis_result = "Healthy";
        $stmt = $conn->prepare("INSERT INTO crop_health (farmer_name, crop_name, image_path, analysis_result) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $farmer_name, $crop_name, $target_file, $analysis_result);

        if ($stmt->execute()) {
            $success = "Image uploaded successfully! Analysis result: $analysis_result";
        } else {
            $error = "Error: " . $stmt->error;
        }
    } else if (!isset($error)) {
        $error = "Error uploading file.";
    }
}

$result = $conn->query("SELECT * FROM crop_health");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Crop Health Analysis</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0f5132;
            color: #333;
        }
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        form label {
            font-weight: bold;
        }
        form input, form button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Crop Health Analysis</h1>
    </header>
    <main>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <p class="success"><?= $success ?></p>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="farmer_name">Farmer Name:</label>
            <input type="text" id="farmer_name" name="farmer_name" required>

            <label for="crop_name">Crop Name:</label>
            <input type="text" id="crop_name" name="crop_name" required>

            <label for="crop_image">Upload Crop Image:</label>
            <input type="file" id="crop_image" name="crop_image" accept="image/*" required>

            <button type="submit">Analyze Crop</button>
        </form>

        <h2>Crop Analysis Results</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Farmer Name</th>
                <th>Crop Name</th>
                <th>Image</th>
                <th>Analysis Result</th>
                <th>Upload Date</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['farmer_name'] ?></td>
                    <td><?= $row['crop_name'] ?></td>
                    <td><img src="<?= $row['image_path'] ?>" alt="Crop Image"></td>
                    <td><?= $row['analysis_result'] ?></td>
                    <td><?= $row['upload_date'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </main>
</body>
</html>
<?php
$conn->close();
?>
