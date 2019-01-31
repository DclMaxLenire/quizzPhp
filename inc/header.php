<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
};
?>
<?php require 'fonctions.php';?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="./css/style.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <title>Document</title>
        </head>
            <body>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
        </li>
    
        <?php  if(isset($_SESSION['auth'])): ?> <!------- Si connecté on affiche --------->
        <li class="nav-item"><a class="nav-link" href="logout.php">Se déconnecter</a></li>
        <li class="nav-item"><a class="nav-link" href="account.php">Mon compte</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php">Retour Accueil</a></li>

        <?php else: ?> <!------- Si pas connecté on afficher -------------------->
        <li class="nav-item"><a class="nav-link" href="register.php">S'inscrire</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Se connecter</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php">Retour Accueil</a></li>
        
        <?php endif; ?>
    
    </ul>
</nav>

<div class="container">

<?php if(isset($_SESSION['flash'])): ?> <!----- Gère les messages d'erreurs ----------->
<?php foreach($_SESSION['flash'] as $type => $message): ?>

<div class="alert alert-<?= $type; ?>">
<?= $message; ?>
</div>

<?php endforeach; ?>
<?php unset($_SESSION['flash']); ?> <!--------- Supprime le message d'erreur ---------------->
<?php endif; ?>

</div>

<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
            </body>

    </html>