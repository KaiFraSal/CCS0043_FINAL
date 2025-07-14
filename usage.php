<?php
include 'db.php';
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");

$user = $_SESSION['user_id'];

$ratePerCubicMeter = 15;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usage = floatval($_POST['usage']);
    $computedBill = $usage * $ratePerCubicMeter;

    $conn->query("UPDATE users SET current_bill = current_bill + $computedBill WHERE username = '$user'");

    $message = "Usage recorded: {$usage} m³. New bill: ₱" . number_format($computedBill, 2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/usage.css">
    <title>Compute Water Usage</title>
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
                    <li><a href="balance.php">Bills</a></li>
                    <li><a href="usage.php" class="active">Usage</a></li>
                    <li><a href="payment.php">Payment</a></li>
                    <li><a href="load.php">Load</a></li>
                </ul>
            </nav>
        </div>

        <div class="main">
            <div class="statement">
                <h1>Monthly Water Usage</h1>

                <?php if (!empty($error)): ?>
                    <p><?= $error ?></p>
                <?php endif; ?>
                <form class="flex-form" method="POST">
                    <label for="amount">Water Used (in cubic meters):</label>
                    <input type="number" step="0.01" name="usage" id="usage" required>
                    <button type="submit" class="pay-btn">Pay Now</button>
                </form> 
                <a href="menu.php"><button class="submit-btn">Back to Menu</button></a>
            </div>
        </div>
    </div>
</body>
</html>
