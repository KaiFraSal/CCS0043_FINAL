<?php
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/menu.css">
    <title>MayPay Menu</title>
</head>
<body>
    <div class="container">
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
                <h1><scan class="blue">May<scan class="green">Pay</h1><br>
                <p>Welcome to your water bill management system.</p>
            </div>

            <div class="bottom-button">TEXT</div>
        </div>
    </div>

    <footer>
        <div>
            <p id="contact">Contact Us!</p>
            <p>Email: MayPay@sample.com</p>
            <p>Address: Muntinlupa, Alabang</p>
            <p>Number: 09XX-XXX-XXXX</p>
        </div>
        <div>
            <p>©2025</p>
            <p>This site is created for educational purpose only</p>
        </div>
        <div>
            <p>Don't forget to follow us!</p>
            <div id="iconGrid">
                <div id="facebook" class="icon"><img src="assets/facebook-logo-24.png" alt=""></div>
                <div id="instagram" class="icon"><img src="assets/instagram-alt-logo-24.png" alt=""></div>
                <div id="youtube" class="icon"><img src="assets/youtube-logo-24.png" alt=""></div>
            </div>
        </div>
    </footer>
</body>
</html>
