<?php

if(!empty($_POST) && !empty($_POST['userName']) && !empty($_POST['userPassword'])) { // Verifie si c'est remplis pour ne pas aller chercher dans la base de donnée si il n'y a rien
    
require_once 'inc/db.php';

$req = $pdo->prepare('SELECT * FROM membre WHERE (nomMembre = :nomMembre OR emailMembre = nomMembre) AND confirmedDateMembre IS NOT NULL');
$req->execute(['nomMembre' => $_POST['userName']]);
$user = $req->fetch(); // Récupère l'utilisateur
session_start();

if(password_verify($_POST['userPassword'], $user->motDePasseMembre)){

$_SESSION['auth'] = $user;
$_SESSION['flash']['success'] = 'Vous etes maintenant bien connecté';
header('Location: account.php');
exit();

} else {

$_SESSION['flash']['danger'] = "Heu vous avez fait une erreur d'email ou de mot de passe";
header('Location: login.php');
exit();

}
}

include('inc/header.php'); ?>

<div class="container">

    <h1 class="text-center">Se connecter </h1>

        <form method="POST" action="">

            <div class="form-group">

                <label for="">Pseudo ou email</label>
                <input type="text" name="userName" class="form-control" required />

                <label for="">Mot de passe<a href="forget.php">(J'ai oublié mon mot de passe)</a></label>
                <input type="password" name="userPassword" class="form-control" required/><br>

                <button type="submit" class="btn btn-primary">Se connecter</button><br>

                <br><label for="">Retour <a href="index.php">Acceuil</a></label>
               

        </form>

<?php include'inc/footer.php';