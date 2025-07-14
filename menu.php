<?php
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/menu.css">
    <title>MayPay Menu</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="menu.php">Home</a></li>
            <li><a href="balance.php">Bills</a></li>
            <li><a href="usage.php">Enter Usage</a></li>
            <li><a href="payment.php">Payment</a></li>
            <li><a href="load.php">Load</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    
    <div class="main">
        <h1>MayPay</h1>
        <p>Welcome to your water bill management system.</p>
    </div>
</body>
</html>
