<?php

$userId = $_GET['id'];

$token = $_GET['token'];

require 'inc/db.php';

$req= $pdo->prepare('SELECT * FROM membre WHERE idMembre = ?');

$req->execute([$userId]);

$user = $req->fetch();


if($user && $user->validationTokenMembre == $token) {

    session_start();
    
    $pdo->prepare('UPDATE membre SET validationTokenMembre = NULL, confirmedDateMembre = NOW() WHERE idMembre = ?')->execute([$userId]);

    $_SESSION['flash']['success'] = 'Votre compte a bien été validé';

    $_SESSION['auth'] = $user;

    header('Location: account.php');

    die('ok');

} else{
    
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
    header('Location: login.php');
    exit();
}















?>