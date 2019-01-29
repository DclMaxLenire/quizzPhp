<?php

$pdo = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

