<?php
include 'db.php';
include 'functions.php';
if (!isLoggedIn()) header("Location: login.php");

$user = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $conn->query("UPDATE users SET balance = balance + $amount WHERE username='$user'");
    $message = "Loaded ₱$amount successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/load.css">
    <title>Load Balance</title>
</head>
<body>
    <div class="container">
    <form method="POST">
        <h2>Enter Load Amount:</h2>
        <input type="number" name="amount" required>
        <button type="submit">Load</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <a href="menu.php"><button>Back to Menu</button></a>
    </div>
</body>
</html>
