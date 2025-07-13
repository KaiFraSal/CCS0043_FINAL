<?php
include 'db.php';
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");

$user = $_SESSION['user_id'];

$ratePerCubicMeter = 15;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usage = floatval($_POST['usage']);
    $computedBill = $usage * $ratePerCubicMeter;

    $conn->query("UPDATE users SET current_bill = $computedBill WHERE username = '$user'");

    $message = "Usage recorded: {$usage} m³. New bill: ₱" . number_format($computedBill, 2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Compute Water Usage</title>
</head>
<body>
    <div class="container">
        <h2>Enter Monthly Water Usage</h2>
        <form method="POST">
            <label for="usage">Water Used (in cubic meters):</label><br>
            <input type="number" step="0.01" name="usage" id="usage" required>
            <br><br>
            <button type="submit">Compute Bill</button>
        </form>

        <?php if (isset($message)) echo "<p style='margin-top:20px;color:limegreen;'>$message</p>"; ?>

        <br>
        <a href="menu.php"><button>Back to Dashboard</button></a>
    </div>
</body>
</html>
