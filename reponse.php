<?php
include 'inc/header.php';

require 'inc/db.php';

$win = 0;
$lose1 = 0;
$lose2 = 0;


$test = $_POST['reponse'.$i];

$idQuestionnaire = $_POST['idQuestionnaire'];
$req = $pdo->prepare('SELECT titreQuestionnaire, question, reponse1 , reponse2, bonneReponse, nbQuestion FROM questionnaire, question WHERE questionnaire.idQuestionnaire = :idQuestionnaire AND question.idQuestionnaire = :idQuestionnaire');
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->execute();

?>

<h1 class="text-center">Verifiez vos réponses</h1>
<div class="row justify-content-center">
<div class="col-12 col-lg-3 border border-danger mt-3">
<h5 class="font-weight-bold mt-3 mb-3">Les mauvaises réponses</h5>
<?php
$i = 1;
while ($donnees = $req->fetch()) {
$i;
    $reponse1 = $donnees->reponse1;
    echo "<h5>Question $i : $reponse1</h5>";
$i++;
}
?>
</div>

<?php 
$req = $pdo->prepare('SELECT titreQuestionnaire, question, reponse1 , reponse2, bonneReponse, nbQuestion FROM questionnaire, question WHERE questionnaire.idQuestionnaire = :idQuestionnaire AND question.idQuestionnaire = :idQuestionnaire');
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->execute();
?>
<div class="col-12 col-lg-3 border border-danger mt-3">
<tr>
<h5 class="font-weight-bold mt-3 mb-3">Les mauvaises réponses</h5>
<?php
$i = 1;
while ($donnees = $req->fetch()) {
$i;
    $reponse2 = $donnees->reponse2;
    echo "<h5>Question $i : $reponse2</h5>";
$i++;
}
?>
</div>

<div class="col-12 col-lg-3 border border-success mt-3 ml-3">
<h5 class="font-weight-bold mt-3 mb-3">Vos réponses dans l'orde des questions</h5>
<?php
$test;
echo implode("<h5>", $test) ;

?>
</div>
</div>

<a class="btn btn-primary" href="index.php">Retour Accueil</a>