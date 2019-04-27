<?php include 'inc/header.php'; 

session_start();
if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->pseudo; ?></h5>
<?php else: ?>
<?php endif; ?>
<?php 
require 'inc/db.php';

echo $_SESSION['quizz']->idQuestionnaire;
$idQuestionnaire = $_SESSION['quizz']->idQuestionnaire;

if (!isset($_POST['ajouterQuestion'])) {
    $req = $pdo->prepare('INSERT INTO question SET nbQuestion = :nbQuestion, question = :question, reponse1 = :reponse1, reponse2 = :reponse2, bonneReponse = :bonneReponse, idQuestionnaire = :idQuestionnaire');
    $req->bindParam(':nbQuestion', $_POST['nbQuestion']);
    $req->bindParam(':question', $_POST['question']);
    $req->bindParam(':reponse1', $_POST['reponse1']);
    $req->bindParam(':reponse2', $_POST['reponse2']);
    $req->bindParam(':bonneReponse', $_POST['bonneReponse']);
    $req->bindParam(':idQuestionnaire', $idQuestionnaire);
    $req->execute();
    }
?>

<h5>Vos questionnaire </h5>

<?php



$idMembre = $_SESSION['auth']->idMembre;
$idQuizz = $_SESSION['quizz']->idQuestionnaire;
echo $_SESSION['quizz']->idQuestionnaire;

if(isset($_POST['ajouterQuestion'])) {
        $verification = $pdo->prepare('SELECT * FROM question WHERE idQuestionnaire = :idQuestionnaire AND nbQuestion = :nbQuestion');
        $verification->bindParam(':idQuestionnaire', $idQuizz);
        $verification->bindParam(':nbQuestion', $_POST['nbQuestion']);
        $verification->execute();

        $questionExisteDeja = $verification->fetch();
        
if($questionExisteDeja) {
    echo 'ce numéro de question est déjà attribué';
} else {
$req = $pdo->prepare('INSERT INTO question SET nbQuestion = :nbQuestion, question = :question, reponse1 = :reponse1, reponse2 = :reponse2, bonneReponse = :bonneReponse, idQuestionnaire = :idQuestionnaire');
$req->bindParam(':nbQuestion', $_POST['nbQuestion']);
$req->bindParam(':question', $_POST['question']);
$req->bindParam(':reponse1', $_POST['reponse1']);
$req->bindParam(':reponse2', $_POST['reponse2']);
$req->bindParam(':bonneReponse', $_POST['bonneReponse']);
$req->bindParam(':idQuestionnaire', $idQuizz);
$req->execute();
}}

$req = $pdo->prepare('SELECT * FROM questionnaire WHERE idMembre = :idMembre AND idQuestionnaire = :idQuestionnaire');
$req->bindParam(':idMembre', $idMembre);
$req->bindParam(':idQuestionnaire', $idQuizz);
$req->execute();


while ($quizzCreation = $req->fetch())
{
?>
<h5>Titre du quizz </h5>
<p><?php echo $quizzCreation->titreQuestionnaire ?></p>
<p><?php echo $idQuizz ?></p>
<a href="creationQuestion.php?idQuizz=<?php echo $idQuizz ?>">Ajouter d'autre question.</a>
<?php
}
?>