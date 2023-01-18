<?php
session_start();
if (empty($_SESSION['user_type'])) {
    header("Location:../primer5001index.php");
    exit();
}

if ($_SESSION['user_type'] != 2) {
    header("Location:../primer5001index.php");
    exit();
}
?>