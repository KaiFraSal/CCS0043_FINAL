<?php
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>MayPay Menu</title>
</head>
<body>
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

        <div class="bottom-button">MayPay is a platform for easy and secure Maynilad water bill payments.</div>
    </div>
</body>
</html>
