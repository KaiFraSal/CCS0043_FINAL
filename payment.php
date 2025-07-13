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
    <link rel="stylesheet" href="styles.css">
    <title>Pay Current Bill</title>
</head>
<body>
    <div class="container">
        <h2>Water Bill Payment</h2>
        <p><strong>Current Bill:</strong> ₱<?= number_format($currentBill, 2) ?></p>
        <p><strong>Available Balance:</strong> ₱<?= number_format($balance, 2) ?></p>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="amount">Enter Exact Payment:</label>
            <input type="number" step="0.01" name="amount" id="amount" required>
            <button type="submit">Pay Now</button>
        </form>

        <br>
        <a href="menu.php"><button>Back to Menu</button></a>
    </div>
</body>
</html>
