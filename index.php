<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: menu.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
