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
    <!-- Sidebar -->


    <!-- Main Content -->
    <div class="content">
        <!-- Logo and Nav -->
        <div class="header">
            <div class="logo">
                <div class="logo-box"><img src="assets/Maynilad-Logo.png" alt="logo"></div>
                <div class="logo-text">
                    <strong>MayPay</strong><br>
                    <small>Payment App</small>
                </div>
            </div>

            <nav>
                <ul>
                    <li><a href="menu.php">Home</a></li>
                    <li><a href="balance.php" class="active">Bills</a></li>
                    <li><a href="payment.php">Payment</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Card -->
        <div class="main">
            <div class="sidebar">
                Text
            </div>
            <div class="statement">
                <h1>Water Bill Statement</h1>
                <div class="form-group">Account Balance: ₱<?= $row['balance'] ?></div>
                <div class="form-group">Current Bill: ₱<?= $row['current_bill'] ?></div>
                <a href="menu.php"><button class="submit-btn">Back to Menu</button></a>
            </div>
        </div>
    </div>
</body>
</html>
