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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Compute Water Usage</title>
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
                <li><a href="usage.php"class="active">Usage</a></li>
                <li><a href="payment.php">Payment</a></li>
                <li><a href="load.php">Load</a></li>
            </ul>
        </nav>
    </header>


        <div class="main">
            <div class="statement">
                <h1>Monthly Water Usage</h1>

                <?php if (!empty($error)): ?>
                    <p><?= $error ?></p>
                <?php endif; ?>
                <form class="flex-form" method="POST">
                    <label for="amount">Water Used (in cubic meters):</label>
                    <input type="number" step="0.01" name="usage" id="amount" required>
                    <button type="submit" class="pay-btn">Compute</button>
                </form> 

                <?php if (isset($message)) echo "<p>$message</p>"; ?>

                <a href="menu.php"><button class="submit-btn">Back to Menu</button></a>
            </div>
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