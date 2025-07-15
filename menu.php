<?php
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MayPay Menu</title>
</head>
<body>
    <div class="main-container">
        <div class="sidebar">
            <img src="assets/CCS0043_Finals_Logo_Menu.png" alt="logo">
        </div>

        <div class="content">
            <nav>
                <ul>
                    <li><a href="menu.php" class="active">Home</a></li>
                    <li><a href="balance.php">Bills</a></li>
                    <li><a href="usage.php">Usage</a></li>
                    <li><a href="payment.php">Payment</a></li>
                    <li><a href="load.php">Load</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>

            <div class="main">
                <h1>
                    <span class="blue">May</span><span class="green">Pay</span>
                </h1>
                <p>Welcome to your water bill management system.</p>
            </div>

            <div class="bottom-button">MayPay is a platform for easy and secure Maynilad water bill payments.</div>
        </div>
    </div>
   
    <footer>
        
        
        <div class="footer-section">
            <h3>Get in Touch</h3>
            <div class="contact-info">
                <p><strong>📧 Email:</strong> MayPay@sample.com</p>
                <p><strong>📍 Address:</strong> Muntinlupa, Alabang</p>
                <p><strong>📞 Hotline:</strong> 09XX-XXX-XXXX</p>
                <p><strong>💧 Emergency:</strong> 1627</p>
            </div>
        </div>
        
        <div class="footer-section company-info">
            <div class="year">©2025</div>
            <p>Maynilad Water Services, Inc.</p>
            <p class="disclaimer">This site is created for educational purpose only</p>
            <p>Committed to providing safe, potable water and efficient wastewater services</p>
        </div>
        
        <div class="footer-section social-section">
            <h3>Stay Connected</h3>
            <p>Follow us for updates and announcements</p>
            <div class="social-grid">
                <div id="facebook" class="social-icon">
                    <img src="assets/facebook-logo-24.png" alt="Facebook">
                </div>
                <div id="instagram" class="social-icon">
                    <img src="assets/instagram-alt-logo-24.png" alt="Instagram">
                </div>
                <div id="youtube" class="social-icon">
                    <img src="assets/youtube-logo-24.png" alt="YouTube">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>