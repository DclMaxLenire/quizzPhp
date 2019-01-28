<?php

if(!empty($_POST) && !empty($_POST['userName']) && !empty($_POST['userPassword'])) { // Verifie si c'est remplis pour ne pas aller chercher dans la base de donnée si il n'y a rien

require_once 'inc/db.php';

require_once 'inc/fonctions.php';

$req = $pdo->prepare('SELECT * FROM usersInformations WHERE (username = :username OR email = :username) AND confirmedDate IS NOT NULL');

$req->execute(['username' => $_POST['userName']]);

$user = $req->fetch(); // Récupère l'utilisateur

if(password_verify($_POST['userPassword'], $user->password)){

    session_start();

    $_SESSION['auth'] = $user;

    $_SESSION['flash']['success'] = 'Vous etes maintenant bien connecté';

    header('Location: account.php');

    exit();

} else {

    header('Location: login.php');
}
}
?>

<h1>Se connecter </h1>

<form method="POST" action="">
<link rel="stylesheet" href="css/bootstrap.min.css">

<div class="form-group">

    <label for="">Pseudo ou email</label>
    <input type="text" name="userName" class="form-control" />

    <label for="">Mot de passe</label>
    <input type="password" name="userPassword" class="form-control" />

    <button type="submit" class="btn btn-primary">Se connecter</button>
    <a href="index.php">Acceuil</a>

</form>