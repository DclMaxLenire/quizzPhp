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
    <ul class="nav navbar-nav">

        <?php  if(isset($_SESSION['auth'])): ?> <!------- Si connecté on affiche --------->

        <li><a href="logout.php">Se déconnecter</a></li>

        <?php else: ?> <!------- Si pas connecté on afficher -------------------->

        <li><a href="register.php">S'inscrire</a></li>
        <li><a href="login.php">Se connecter</a></li>
        
     <?php endif; ?>


    </ul>
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


</body>
</html>