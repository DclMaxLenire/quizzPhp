<?php

$userId = $_GET['id'];

$token = $_GET['token'];

require 'inc/db.php';

$req= $pdo->prepare('SELECT * FROM usersInformations WHERE id = ?');

$req->execute([$userId]);

$user = $req->fetch();


if($user && $user->validationToken == $token) {

    session_start();
    
    $pdo->prepare('UPDATE usersInformations SET validationToken = NULL, confirmedDate = NOW() WHERE id = ?')->execute([$userId]);

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