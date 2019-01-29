<?php 

session_start();

require 'inc/fonctions.php';

loggedOnly();

?>

<?php require 'inc/header.php'; ?>

<h2 class="text-center">Votre compte </h2>


<div class="container">
        <div class="row justify-content-center">
            <div class="col-12-justify-content-center">
            Bienvenu sur ZiuQuiz
            </div>

            <div class="container">

            <ul class="nav justify-content-center">
                <li class="nav-item">
                <a class="nav-link" href="themeChoix.php">Répondre à un questionaire</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="creationQuestionnaire.php">Crée un questionaire</a>
                </li>
            </ul>
            <div>
        </div>
    </div>

<?php require 'inc/footer.php'; ?>