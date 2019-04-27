<?php require 'inc/header.php'; ?>

<?php 
loggedOnly();
?>
        <h2 class="text-center">Mon compte</h2>
        <h5 class="text-center">Bonjour  <?= $_SESSION['auth']->pseudo; ?></h5>

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
<h1> <?php echo $donnees->titreQuestionnaire ?> </h1>

<p> Question <?php echo $donnees->nbQuestion ?> : <?php echo $donnees->question ?> </h1>
<p> <?php echo $donnees->reponse1 ?> </p>
<p> <?php echo $donnees->reponse2 ?> </p>
<p> <?php echo $donnees->bonneReponse ?> </p>
<?php
}
?>


