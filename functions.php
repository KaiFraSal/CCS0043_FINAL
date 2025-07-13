<?php
function generateReference() {
    return 'REF' . time() . rand(1000, 9999);
}

function isLoggedIn() {
    session_start();
    return isset($_SESSION['user_id']);
}
?>
