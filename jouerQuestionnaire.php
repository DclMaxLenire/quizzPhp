<?php include 'inc/header.php';?>

<?php  if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>
<?php else: ?>
<?php endif; ?>
    <h5 class="text-center">Repondez à toutes les questions puis valider</h5>

<?php

require 'inc/db.php';

// Affiche le questionnaire 
$idQuestionnaire = $_GET['idQuestionnaire'];
$req = $pdo->prepare('SELECT titreQuestionnaire, question, reponse1 , reponse2, bonneReponse, nbQuestion FROM questionnaire, question WHERE questionnaire.idQuestionnaire = :idQuestionnaire AND question.idQuestionnaire = :idQuestionnaire');
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->execute();

while ($donnees = $req->fetch()) {

?>

<p> Question <?php echo $donnees->nbQuestion ?> : <?php echo $donnees->question ?> </h1>
<p> <?php echo $donnees->reponse1 ?> </p>
<p> <?php echo $donnees->reponse2 ?> </p>
<p> <?php echo $donnees->bonneReponse ?> </p>
<?php
}
?>