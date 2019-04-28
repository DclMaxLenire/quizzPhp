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
$i = 0;
?>
<form method="POST" action="reponse.php">

<input type="hidden" name="idQuestionnaire" value="<?php echo $idQuestionnaire ?>"/>
<input type="hidden" name="nbQuestion" value="<?php echo $donnees->nbQuestion ?>"/>

<h5 class="text-center font-weight-bold col-12">Question <?php echo $donnees->nbQuestion ?> : <?php echo $donnees->question ?> </h5>

<div class="text-center">
<input type="checkbox" name="reponse1" value="<?php echo $donnees->reponse1 ?>"/><label><?php echo $donnees->reponse1 ?></label>
</div>

<div class="text-center">
<input type="checkbox" name="reponse2" value="<?php echo $donnees->reponse2 ?>"/><label><?php echo $donnees->reponse2 ?></label>
</div>

<div class="text-center">
<input type="checkbox" name="reponse3" value="<?php echo $donnees->bonneReponse ?>"/><label><?php echo $donnees->bonneReponse ?></label>
</div>

<?php
$i++;
}
?>
<button class="btn btn-primary" type="submit">Valider mes réponses</button>
</form>