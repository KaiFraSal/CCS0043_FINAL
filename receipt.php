<?php
include 'db.php';
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");

$user = $_SESSION['user_id'];

if (!isset($_GET['ref'])) {
    echo "No reference number provided.";
    exit;
}

$ref = $_GET['ref'];
$sql = "SELECT * FROM receipts WHERE ref = '$ref' AND username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "Receipt not found or access denied.";
    exit;
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/receipt.css">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Receipt - MayPay</title>
</head>
<body>
    <header class="top-header">
        <div class="logo-container">
            <img src="assets/CCS0043_Finals_Logo.png" alt="logo" class="logo-img">
            <div class="logo-label">
                <strong>MayPay</strong><br>
                <small>Payment App</small>
            </div>
        </div>

        <nav>
            <ul>
                <li><a href="menu.php">Home</a></li>
                <li><a href="balance.php">Bills</a></li>
                <li><a href="usage.php">Usage</a></li>
                <li><a href="payment.php" class="active">Payment</a></li>
                <li><a href="load.php">Load</a></li>
            </ul>
        </nav>
    </header>

        <div class="main">
            <div class="statement">
                <h1>Payment Reciept</h1>
                <div class="form-group"><b>Username:</b> <?=htmlspecialchars($row['username'])?></div>
                <div class="form-group"><b>Amount Paid:</b> ₱<?=number_format($row['amount'], 2)?></div>
                <div class="form-group"><b>Reference No:</b> <?=htmlspecialchars($row['ref'])?></div>
                <div class="form-group"><b>Date:</b> <?=$row['date']?></div>
                <a href="menu.php"><button class="submit-btn">Back to Menu</button></a>
            </div>
        </div>
    </div>
</body>
</html>