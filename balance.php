<?php
include 'db.php';
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");

$user = $_SESSION['user_id'];
$result = $conn->query("SELECT balance, current_bill FROM users WHERE username='$user'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/balance.css">
    <title>Check Balance</title>
</head>
<body>
    <div class="content">
        <div class="header">
            <div class="logo">
                <div class="logo-box"><img src="assets/CCS0043_Finals_Logo.png" alt="logo"></div>
                <div class="logo-text">
                    <strong>MayPay</strong><br>
                    <small>Payment App</small>
                </div>
            </div>

            <nav>
                <ul>
                    <li><a href="menu.php">Home</a></li>
                    <li><a href="balance.php" class="active">Bills</a></li>
                    <li><a href="usage.php">Usage</a></li>
                    <li><a href="payment.php">Payment</a></li>
                    <li><a href="load.php">Load</a></li>
                </ul>
            </nav>
        </div>

        <div class="main">
            <div class="statement">
                <h1>Water Bill Statement</h1>
                <div class="form-group"><b>Account Balance:</b> ₱<?= $row['balance'] ?></div>
                <div class="form-group"><b>Current Bill:</b> ₱<?= $row['current_bill'] ?></div>
                <a href="menu.php"><button class="submit-btn">Back to Menu</button></a>
            </div>
        </div>
    </div>
</body>
</html>
