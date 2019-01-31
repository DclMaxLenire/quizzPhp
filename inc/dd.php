<?php
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);