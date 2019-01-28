<?php

    session_start();

    unset($_SESSION['auth']); // Suprime la partie d'authentification

    
    header('Location: login.php');

    exit();
?>