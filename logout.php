<?php

    session_start();
    unset($_SESSION['auth']); // Suprime la partie d'authentification
    unset($_SESSION['quizz']);
    $_SESSION['flash']['success'] = 'Vous etes bien déconnecté à la prochaine';
    header('Location: login.php');