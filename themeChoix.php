<?php include_once 'inc/header.php';?>

<h1>Veuillez choisir un theme<h1>

<?php

$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$choixDuTheme = $bdd->query('SELECT nomTheme FROM theme ORDER BY idTheme DESC'); 

// Affiche chaque theme
while ($donnees = $choixDuTheme->fetch()){
echo '<p>NOM DU THEME <strong>' .$donnees['nomTheme'] . '</strong></p>';

}
