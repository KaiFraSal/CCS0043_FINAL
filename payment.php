<?php
include 'db.php';
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");

$user = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];

    $userCheck = $conn->query("SELECT balance FROM users WHERE username='$user'");
    $row = $userCheck->fetch_assoc();
    
    if ($row['balance'] >= $amount) {
        $conn->query("UPDATE users SET balance = balance - $amount WHERE username='$user'");
        $conn->query("UPDATE users SET current_bill = current_bill - $amount WHERE username='$user'");
        $ref = generateReference();
        $conn->query("INSERT INTO receipts (username, amount, ref) VALUES ('$user', $amount, '$ref')");
        header("Location: receipt.php?ref=$ref");
        exit;

    } else {
        echo "Insufficient balance.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Make Payment</title>
</head>
<body>
    <form method="POST">
        <h2>Enter Payment Amount:</h2>
        <input type="number" name="amount" required>
        <button type="submit">Pay</button>
    </form>
    <a href="menu.php"><button>Back to Menu</button></a>
</body>
</html>
