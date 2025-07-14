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
    <link rel="stylesheet" href="/css/balance.css">
    <title>Check Balance</title>
</head>
<body>
    <div class="main">
        <h1>Water Bill Statement</h1>
        <h2>Account Balance: ₱<?= $row['balance'] ?></h2>
        <h2>Current Bill: ₱<?= $row['current_bill'] ?></h2>
    </div>
    
    <a href="menu.php"><button>Back to Menu</button></a>
</body>
</html>
