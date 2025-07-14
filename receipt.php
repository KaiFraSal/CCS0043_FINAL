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
    <link rel="stylesheet" href="/css/receipt.css">
    <title>Receipt - MayPay</title>
</head>
<body>
    <div class="container">
        <h2>Payment Receipt</h2>
        <p><strong>Username:</strong> <?= htmlspecialchars($row['username']) ?></p>
        <p><strong>Amount Paid:</strong> ₱<?= number_format($row['amount'], 2) ?></p>
        <p><strong>Reference No:</strong> <?= htmlspecialchars($row['ref']) ?></p>
        <p><strong>Date:</strong> <?= $row['date'] ?></p>
        <br>
        <a href="menu.php"><button>Back to Menu</button></a>
    </div>
</body>
</html>
