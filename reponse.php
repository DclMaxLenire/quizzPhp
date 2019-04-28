<?php
include 'inc/header.php';

require 'inc/db.php';

$req = $pdo->prepare('SELECT * FROM question WHERE  bonneReponse = :bonneReponse AND idQuestionnaire = :idQuestionnaire');
$req->bindParam(':bonneReponse', $_POST['reponse3']);
$req->bindParam(':idQuestionnaire', $_POST['idQuestionnaire']);
$req->execute();
$verifReponse = $req->fetch();

$req = $pdo->prepare('SELECT * FROM question WHERE reponse1 = :reponse1 AND idQuestionnaire = :idQuestionnaire');
$req->bindParam(':reponse1', $_POST['reponse1']);
$req->bindParam(':idQuestionnaire', $_POST['idQuestionnaire']);
$req->execute();
$verifMauvaiseReponse1 = $req->fetch();

$req = $pdo->prepare('SELECT * FROM question WHERE reponse2 = :reponse2 AND idQuestionnaire = :idQuestionnaire');
$req->bindParam(':reponse2', $_POST['reponse2']);
$req->bindParam(':idQuestionnaire', $_POST['idQuestionnaire']);
$req->execute();
$verifMauvaiseReponse2 = $req->fetch();

$win = 0;
$lose1 = 0;
$lose2 = 0;

    if($verifMauvaiseReponse1) {
        $lose1++;
    } 

    if($verifMauvaiseReponse2) {
        $lose2++;
    }
    
if($verifReponse) {
    $win++;
} 

if($lose1 >= 1 || $lose2 >= 1 ) {
echo "<h5>Bien joué, Mais vous avez fait quelques fautes</h5>";
} else {
    echo "<h5>Bien joué c'est un sans faute</h5>";
}
?>
<a class="btn btn-primary" href="index.php">Retour Accueil</a>