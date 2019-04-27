<?php 
include 'inc/header.php'; 


if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->pseudo; ?></h5>
<?php else: ?>
<?php endif; ?>
<?php 
require 'inc/db.php';



$nomQuestionnaire = $_POST['nomQuestionnaire'];
$idMembre = $_SESSION['auth']->idMembre;
$etat = 0;
$idCategorie = $_POST['idCategorie'];
echo $idCategorie;

// Insert le titre dans la base de donées //
if(isset($_POST['validerLeTitre']) && !empty($_POST['nomQuestionnaire'])) {
    $existeTitre = $pdo->prepare('SELECT * FROM questionnaire WHERE titreQuestionnaire = :titreQuestionnaire');
    $existeTitre->bindParam(':titreQuestionnaire', $nomQuestionnaire);
    $existeTitre->execute();
    $titreExisteDeja = $existeTitre->fetch();
if($titreExisteDeja){

} else {
$req = $pdo->prepare('INSERT INTO questionnaire SET titreQuestionnaire = :titreQuestionnaire, etat = :etat, dateQuestionnaire = NOW(), idMembre = :idMembre, idCategorie = :idCategorie');
$req->bindParam(':titreQuestionnaire', $nomQuestionnaire);
$req->bindParam(':etat', $etat);
$req->bindParam(':idMembre', $idMembre);
$req->bindParam(':idCategorie', $idCategorie);
$req->execute();
}}

// Recupère l'id du titre pour la création de question //
$req = $pdo->prepare('SELECT * FROM questionnaire WHERE (titreQuestionnaire = :titreQuestionnaire OR idQuestionnaire = :idQuestionnaire)');
$req->bindParam(':titreQuestionnaire', $nomQuestionnaire);
$req->bindParam(':idQuestionnaire' , $_GET['idQuizz']);
$req->execute();
$quizz = $req->fetch();

// Stock l'idée du titre qui vien d'être créer //
$_SESSION['quizz'] = $quizz;
$idQuestionnaire = $_SESSION['quizz']->idQuestionnaire;
?>
<h5><?php echo $_SESSION['quizz']->titreQuestionnaire; ?></h5>

<form method="POST" action="creationQuestionnaire.php">

    <div class="form-group">

            <label> Numéro de la question <label>
            <input type="number" name="nbQuestion"/>

            <label>Ajouter votre question</label>
            <input type='text' name="question"/>

            <label> Reponse 1 </label>
            <input type="text" name="reponse1"/>

            <label> Reponse 2 </label>
            <input type="text" name="reponse2"/>

            <label> Bonne réponse </label>
            <input type="text" name="bonneReponse"/>


        <button type="submit" class="btn btn-primary" name="ajouterQuestion">Valider ma question</button>
        <a href="account.php">Retour mon compte</a>

    </div>
</form>