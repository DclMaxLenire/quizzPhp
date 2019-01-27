<?php

$userId = $_GET['id'];

$token = $_GET['token'];

require 'db.php';

$req= $pdo->prepare('SELECT validationToken FROM usersInformations WHERE id = ?');

$req->execute([$userId]);

$user = $req->fetch();

if($user && $user->validationToken == $token) {

    die('ok');
} else{
    die('pas ok');
}















?>