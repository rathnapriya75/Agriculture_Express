<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Agriculture Marketplace Dashboard</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #8a6240;
            color: #D6ED17FF;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        #welcome {
            background-image: url('./images/welcome.jpg');
            background-size: cover;
            background-position: center;
            color: #faeecb;
            padding: 100px 20px;
            text-align: center;
            position: relative;
        }

        #welcome h2 {
            font-size: 2.5em;
            margin-bottom: 15px;
        }

        #welcome p {
            font-size: 1.2em;
            max-width: 600px;
            margin: 0 auto;
        }

        #welcome::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        nav {
            width: 100%;
            height: 60px;
            background-color: #013221;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 15px;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        nav a {
            font-size: 1em;
            font-weight: 500;
            color: white;
            text-decoration: none;
            padding: 0 10px;
            font-weight: bold;
        }

        nav a:hover {
            color: #f9b233;
        }

        h2 {
            margin-top: 20px;
        }

        p {
            margin-bottom: 30px;
        }


        .dashboard-button {
            display: inline-block;
            background-color: #4c6444;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dashboard-button:hover {
            background-color: #5a754f;
        }

        .dashboard-button a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        #services {
            padding: 50px 0;
            background-color: #8a6240;
            text-align: center;
        }

        #services h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #f9b233;
        }

        .service-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .service-box {
            background: rgb(232, 183, 183);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            margin: 10px;
            text-align: center;
        }

        .service-icon {
            font-size: 3em;
            color: #1a73e8;
            margin-bottom: 15px;
        }

        .service-box h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .service-box p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.5;
        }

        /* Footer Part */
        footer {
            width: 100%;
            background: #013221;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .socials {
            margin-top: 10px;
        }

        .socials a {
            color: white;
            margin: 0 10px;
            font-size: 1.5em;
            text-decoration: none;
        }

        .socials a:hover {
            color: #f9b233;
        }

        @media (max-width: 480px) {
            .footer-content p {
                font-size: 0.9em;
            }

            .socials a {
                margin: 0 3px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <a href="home.php">Home</a>
        <a href="add_product.php">Add Product</a>
        <a href="view_products.php">View Products</a>
        <a href="#farmer_profile">Farmer Profile</a>
        <a href="logout.php">Logout</a>
    </nav>

    <h1>Agriculture Marketplace</h1>

    <section id="welcome">
        <h2>Welcome to the Agriculture Marketplace!</h2>
        <p>Manage your products and connect with customers.</p>
    </section>

    <button class="dashboard-button">
        <a href="add_product.php">Add Products</a>
    </button>
    <button class="dashboard-button">
        <a href="view_products.php">View Products</a>
    </button>

    <button class="dashboard-button">
        <a href="crop_health_analysis.php">Analyze your Crop Health</a>
    </button>

    <section id="services">
        <h2>Services We Offer</h2>
        <div class="service-container">
            <div class="service-box">
                <i class="fas fa-seedling service-icon"></i>
                <h3>Farm Products Listing</h3>
                <p>We help farmers list their fresh produce and products, ensuring they reach a wider audience through our marketplace.</p>
            </div>

            <div class="service-box">
                <i class="fas fa-truck service-icon"></i>
                <h3>Delivery Services</h3>
                <p>Reliable delivery services to ensure that products reach buyers safely and promptly, enhancing customer satisfaction.</p>
            </div>

            <div class="service-box">
                <i class="fas fa-comments service-icon"></i>
                <h3>Customer Support</h3>
                <p>Dedicated customer support to assist both farmers and buyers with inquiries, issues, and feedback for a smooth experience.</p>
            </div>
        </div>
    </section>

    <!-- Footer section starts -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Agriculture Marketplace. All rights reserved.</p>
            <div class="socials">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>
    <!-- Footer section ends -->
</body>

</html>