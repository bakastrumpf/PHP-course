<?php

// session_destroy();
// header('location: primer4402login.php');
    
    session_start();
    unset($_SESSION['korisnik']);
        // login.php
        header('location: primer4402login.php');
        exit;

?>