<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    $_SESSION = array();
    $_SESSION['logged_in'] = false;
    session_destroy();
}
header("Location: login.php");
exit;
?>
