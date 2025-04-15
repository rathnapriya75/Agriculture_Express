<?php
session_start();
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senderName = $_POST['name'];
    $senderEmail = $_POST['email'];
    $senderSubject = $_POST['subject'];
    $senderMessage = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $senderName, $senderEmail, $senderSubject, $senderMessage);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success text-center'>Your message has been saved successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger text-center'>Failed to save your message. Please try again later.</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #b2cf99;
            margin: 0;
            padding: 0;
        }

        .contact-section {
            background: url('./images/contact.jpg') no-repeat center center/cover;
            position: relative;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            z-index: 1;
        }

        .contact-info-section {
            position: relative;
            padding: 40px 20px;
            background: rgba(255, 255, 255, 0.8);
            width: 100vw;
            max-width: 100%;
            border-radius: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .contact-info-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(46, 125, 50, 0.1);
            z-index: -1;
            border-radius: inherit;
        }

        .contact-info-section .text-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .contact-info-section h2 {
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .contact-info-section p {
            text-align: center;
            font-size: 1.1rem;
        }

        .contact-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 30px;
        }

        .contact-card {
            background: #eaf1b1;
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
            flex: 1;
            min-width: 250px;
            max-width: 280px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-card i {
            font-size: 30px;
            color: #2e7d32;
            margin-bottom: 10px;
        }

        .contact-form-section {
            background: #c7d9b5;
            padding: 50px;
            border-radius: 10px;
            margin-top: 50px;
            width: 50%;
        }

        .contact-form-section h2 {
            color: #2e7d32;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-control {
            background: #e8f5e9;
            border-radius: 5px;
            border: 1px solid #4caf50;
        }

        .btn-submit {
            background: #2e7d32;
            color: white;
            padding: 12px;
            width: 100%;
            font-size: 18px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: #1b5e20;
        }

        .chat-box {
            background: #2e7d32;
            padding: 20px;
            color: white;
            border-radius: 10px;
            text-align: center;
            margin-top: 50px;
        }

        .chat-box i {
            font-size: 40px;
        }

        .chat-box button {
            background: white;
            color: #2e7d32;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .chat-box button:hover {
            background: #e0f2f1;
        }

        .map-container {
            margin-top: 50px;
            border-radius: 10px;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .contact-cards {
                flex-direction: column;
                align-items: center;
            }

            .contact-form-section {
                width: 90%;
                padding: 30px;
            }

            img,
            iframe {
                max-width: 100%;
                height: auto;
            }

            .container {
                width: 100%;
                max-width: 1200px;
                margin: auto;
            }
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <div class="contact-section">
        CONTACT US FOR MORE INFORMATION!
    </div>

    <!-- Contact Info Section -->
    <div class="contact-info-section">
        <div class="text-wrapper">
            <h2>Let's Connect & Grow Together</h2>
            <p>Connect with us for collaborations, or any other inquiries.</p>
        </div>

        <div class="contact-cards">
            <div class="contact-card">
                <i class="fas fa-map-marker-alt"></i>
                <p><strong>Visit Us At:</strong><br> MG Road Mysore, Karnataka, India</p>
            </div>
            <div class="contact-card">
                <i class="fas fa-phone"></i>
                <p><strong>Call Us:</strong><br> +91 993 400 146</p>
            </div>
            <div class="contact-card">
                <i class="fas fa-envelope"></i>
                <p><strong>Email Us:</strong><br> info@agricultureblog.com</p>
            </div>
            <div class="contact-card">
                <i class="fas fa-clock"></i>
                <p><strong>Available:</strong><br> Mon-Fri: 10am - 5pm</p>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="container contact-form-section">
        <h2>Reach & Get In Touch With Us!</h2>
        <?php if ($message) echo $message; ?>
        <form method="POST" action="contact_us.php">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="subject" placeholder="Your Subject" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="message" rows="4" placeholder="Enter Message" required></textarea>
            </div>
            <button type="submit" class="btn btn-submit">SEND MESSAGE</button>
        </form>
    </div>

    <!-- Chat Box -->
    <div class="container chat-box">
        <i class="fas fa-comments"></i>
        <p>Chat With Us!<br> For quick inquiries, click the button below.</p>
        <button onclick="startChat()">LET'S CHAT</button>
    </div>

    <!-- Google Map -->
    <div class="container map-container">
        <iframe width="100%" height="300" frameborder="0" style="border:0" allowfullscreen
            src="https://www.google.com/maps/embed/v1/place?key=YOUR_GOOGLE_MAPS_API_KEY&q=MG+Road+Mysore+Karnataka+India">
        </iframe>
    </div>

    <script>
        function startChat() {
            alert("Redirecting to Live Chat...");
        }
    </script>

</body>

</html>
