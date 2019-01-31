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
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <title>Document</title>
        </head>
            <body>

<?php  if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>
<?php else: ?>
<?php endif; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Menu</a>
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
<?php  if(isset($_SESSION['auth'])): ?>
<p class="h5 text-center">Bienvenu sur ZiuQuiz<p>

<div class="container">
<div class="row">
<div class="card text-center" style="width: 20rem;">
<img src="img/quiz.png" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">Répondre à un quiz</h5>
<p class="card-text">De nombreux quiz vous attendent, les Quiz classé par theme</p>
<a href="themeChoix.php" class="btn btn-primary">Aller répondre</a>
</div>
</div>

<div class="card text-center" style="width: 20rem;">
<img src="img/quizImg.jpg" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">Crée un quiz maintenant que tu es inscrit</h5>
<p class="card-text">Créer le quiz idéal</p>
<a href="creationQuestionnaire.php" class="btn btn-primary">Créer un quiz</a>
</div>
</div>

</div>
</div>

</div>
</div>
<?php else: ?>
<p class="h5 text-center">Bienvenu sur ZiuQuiz<p>

<div class="container">
<div class="row">
<div class="card text-center" style="width: 20rem;">
<img src="img/quiz.png" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">Répondre à un quiz</h5>
<p class="card-text">De nombreux quiz vous attendent, les Quiz classé par theme</p>
<a href="themeChoix.php" class="btn btn-primary">Aller répondre</a>
</div>
</div>

<div class="card text-center" style="width: 20rem;">
<img src="img/quizImg.jpg" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">Tu peux aussi créer des quiz, inscrit toi</h5>
<p class="card-text">Créer le quiz idéal</p>
<a href="register.php" class="btn btn-primary">Inscrit toi</a>
</div>
</div>


</div>
</div>















<?php endif; ?>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>