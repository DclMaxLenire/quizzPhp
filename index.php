<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php  if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>

<?php else: ?>

<?php endif; ?>
<div class="container">
<nav class="navbar navbar-expand-sm bg-light">
    <ul class="nav navbar-nav">

        <?php  if(isset($_SESSION['auth'])): ?> <!------- Si connecté on affiche --------->

        <li><a href="logout.php">Se déconnecter</a></li>
        <li><a href="account.php">Mon compte</a></li>
        <li><a href="index.php">Retour Accueil</a></li>

        <?php else: ?> <!------- Si pas connecté on afficher -------------------->
    <h5 class="text-center">Bienvenu sur ZiuQuiz<?= $_SESSION['auth']->nomMembre; ?></h5>
        <li><a href="register.php">S'inscrire</a></li>
        <li><a href="login.php">Se connecter</a></li>
        <li><a href="index.php">Retour Accueil</a></li>
        
<?php endif; ?>
</nav>
</div>
</body>
</html>