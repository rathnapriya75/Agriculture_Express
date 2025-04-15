<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="home.css">
    <title>Agriculture Marketplace</title>
</head>
<body>
     <!-- Navigation bar starts -->
     <nav>
    <div class="logo">AGRICULTURE <span> MARKETPLACE</span></div>
    <a href="#home">Home</a>
    <a href="view_products.php">Products</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_farmer.php">Add Farmers</a>
    <a href="#contact">Contact</a>
    <a href="register.php">Register</a>
</nav>

     <!-- Home Section -->
    <section class="home">
        <div class="home-content">
        <h1>Agriculture <span class="highlight">Marketplace</span></h1>
            <p>Healthy soil, healthy food! Support your local farmers, support your community! </p>
            <div class="features">
            </div>
        </div>
    </section>


     <!-- Categories Section -->
     <section class="categories">
        <div class="category">
            <img src="./images/Fruits.jpg" alt="Fruits">
            <p>Fruits</p>
        </div>
        <div class="category">
            <img src="./images/Vegetables.jpg" alt="Vegetables">
            <p>Vegetables</p>
        </div>
        <div class="category">
            <img src="./images/Legumes.jpg" alt="Legumes">
            <p>Legumes</p>
        </div>
        <div class="category">
            <img src="./images/nuts.jpg" alt="Nuts">
            <p>Nuts</p>
        </div>
        <div class="category">
            <img src="./images/flowers.jpg" alt="Respiratory Care">
            <p>Respiratory Care</p>
        </div> 
    </section>
    
    <!-- Contact US Part Starts -->
<section class="contact-section" id="contact">
    <div class="contact-container">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>Reach out to us for any inquiries or to learn more about our farms and queries..</p>
        </div>

        <div class="contact-details">
            <div class="detail-item">
                <i class="fa fa-phone"></i>
                <p>Call Us: (+91) 879023740</p>
            </div>
            <div class="detail-item">
                <i class="fa fa-envelope"></i>
                <p>Email Us: agrimarket@gmail.com.com</p>
            </div>
            <div class="detail-item">
                <i class="fa fa-map-marker"></i>
                <p>Mysore <br> Karnataka, 673NH, India</p>
            </div>
        </div>

        <div class="contact-button-container">
            <a href="contact_us.php" class="contact-btn">Contact Us</a>
        </div>
    </div>
</section>
<!-- Contact US Part ends -->



     <!-- Footer section starts -->
     <footer>
        <div class="footer-content">
            <p>&copy; 2025 Agriculture Marketplace. All rights reserved.</p>
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
