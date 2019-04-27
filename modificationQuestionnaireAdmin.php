<?php require 'inc/header.php'; ?>

<?php 
loggedOnly();
?>
        <h2 class="text-center">Mon compte</h2>
        <h5 class="text-center">Bonjour  <?= $_SESSION['auth']->pseudo; ?></h5>

<?php

require 'inc/db.php';
$idQuestionnaire = $_GET['idQuestionnaire'];

if(isset($_POST['validerModification'])) {
    for ($x = 0 ; $x <= $donnees->nbQuestion ; $x++ ){
$modfication = $pdo->prepare('UPDATE question SET question = :question, reponse1 = :reponse1, reponse2 = :reponse2, bonneReponse = :bonneReponse WHERE idQuestionnaire = :idQuestionnaire AND nbQuestion = :nbQuestion');
$modfication->bindParam(':idQuestionnaire', $idQuestionnaire);
$modfication->bindParam(':nbQuestion', $_POST['nbQuestion']);
$modfication->bindParam(':question', $_POST['question']);
$modfication->bindParam(':reponse1', $_POST['reponse1']);
$modfication->bindParam(':reponse2', $_POST['reponse2']);
$modfication->bindParam(':bonneReponse', $_POST['bonneReponse']);
$modfication->execute();
}}


if(isset($_POST['validerEtat'])) {
    $modficationEtat = $pdo->prepare('UPDATE questionnaire SET etat = :etat WHERE idQuestionnaire = :idQuestionnaire');
    $modficationEtat->bindParam(':idQuestionnaire', $idQuestionnaire);
    $modficationEtat->bindParam(':etat', $_POST['etat']);
    $modficationEtat->execute();
}

$etatQuestionnaire = $pdo->prepare('SELECT * FROM questionnaire WHERE idQuestionnaire = :idQuestionnaire');
$etatQuestionnaire->bindParam(':idQuestionnaire', $idQuestionnaire);
$etatQuestionnaire->execute();

?>
<form method="POST">
<?php
while ($questionnaireEtat = $etatQuestionnaire->fetch()) {
    echo "Etat du questionnaire : <input  class='form-control' value='$questionnaireEtat->etat' name='etat'>";
}
?>
<button type="submit" name="validerEtat" id="validerChangement">Valider le changement d'etat</button>
</form>
<?php


$req = $pdo->prepare('SELECT titreQuestionnaire, question, reponse1 , reponse2, bonneReponse, nbQuestion, etat FROM questionnaire, question WHERE questionnaire.idQuestionnaire = :idQuestionnaire AND question.idQuestionnaire = :idQuestionnaire');
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->execute();
while ($donnees = $req->fetch()) {
?>
<form method="POST">

<?php
for ($x = 0 ; $x <= $donnees->question ; $x++ ) {
    $nbQuestion = $donnees->nbQuestion;
    echo "Numéro de la question : <input readOnly='readOnly' class='form-control' value='$nbQuestion' name='nbQuestion'>";
    echo "Intitulé de la question : <input class='form-control' value='$donnees->question' name='question'>";
    echo "reponse 1 : <input class='form-control' value='$donnees->reponse1' name='reponse1'>";
    echo "reponse 2 : <input class='form-control' value='$donnees->reponse2' name='reponse2'>";
    echo "bonne reponse : <input class='form-control' value='$donnees->bonneReponse' name='bonneReponse'>";

}

?>
<button type="submit" name="validerModification" id="validerChangement">Valider</button>
</form>
<?php
}
?>