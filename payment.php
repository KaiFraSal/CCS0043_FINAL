<?php
include 'db.php';
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");

$user = $_SESSION['user_id'];

$userQuery = $conn->query("SELECT balance, current_bill FROM users WHERE username='$user'");
$userData = $userQuery->fetch_assoc();

$balance = $userData['balance'];
$currentBill = $userData['current_bill'];
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputAmount = floatval($_POST['amount']);

    if ($currentBill == 0) {
        $error = "There is no outstanding bill to pay.";
    } elseif ($inputAmount != $currentBill) {
        $error = "You must pay exactly ₱" . number_format($currentBill, 2);
    } elseif ($balance < $inputAmount) {
        $error = "Insufficient balance. Your balance is ₱" . number_format($balance, 2);
    } else {
        $newBalance = $balance - $inputAmount;
        $conn->query("UPDATE users SET balance = $newBalance, current_bill = 0 WHERE username='$user'");

        $ref = generateReference();
        $conn->query("INSERT INTO receipts (username, amount, ref) VALUES ('$user', $inputAmount, '$ref')");

        header("Location: receipt.php?ref=$ref");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/payment.css">
    <title>Pay Current Bill</title>
</head>
<body>
    <div class="content">
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
                    <li><a href="balance.php">Bills</a></li>
                    <li><a href="usage.php">Usage</a></li>
                    <li><a href="payment.php" class="active">Payment</a></li>
                    <li><a href="load.php">Load</a></li>
                </ul>
            </nav>
        </div>

        <div class="main">
            <div class="statement">
                <h1>Water Bill Payment</h1>
                <div class="form-group"><strong>Current Bill:</strong> ₱<?= number_format($currentBill, 2) ?></div>
                <div class="form-group"><strong>Available Balance:</strong> ₱<?= number_format($balance, 2) ?></div>

                <?php if (!empty($error)): ?>
                    <p style="color:red;"><?= $error ?></p>
                <?php endif; ?>
                <form method="POST">
                    <label for="amount">Enter Exact Payment:</label>
                    <input type="number" step="0.01" name="amount" id="amount" required>
                    <button type="submit">Pay Now</button>

                    <input type="text" name="username" placeholder="Username" required><br>
                    <button type="submit">Login</button>
                </form> 
                <a href="menu.php"><button class="submit-btn">Back to Menu</button></a>
            </div>
        </div>
    </div>

</body>
</html>
