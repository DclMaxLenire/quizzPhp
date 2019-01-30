<?php include 'inc/header.php'; 

if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>
<?php else: ?>
<?php endif; ?>
<?php 

if(!empty($_POST)) {
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');

$ajoutQuestionnaire = $bdd->prepare('INSERT INTO questionnaire SET idMembre = ?, dateCreation = NOW(), titreQuiz = ?');
$idMembre = $_SESSION['auth']->idMembre;
$ajoutQuestionnaire->execute([$idMembre, $_POST['quizTitre']]);

$ajoutTheme = $bdd->prepare('INSERT INTO theme SET nomTheme = ?');
$ajoutTheme->execute([$_POST['quizTheme']]);

$ajoutQuestion = $bdd->prepare('INSERT INTO question SET libelleQuestion_question = ?, choixReponse_question = ?, validationReponse = ?');
$ajoutQuestion->execute([$_POST['quizQuestion'], $_POST['quizReponseChoix'], $_POST['quizReponseVrai']]);

}

?>

<form method="POST" action="">

    <div class="form-group">

        <label for="">Theme du quizz</label>
        <input type="text" name="quizTheme" class="form-control" />

        <label for="">Titre du quizz</label>
        <input type="text" name="quizTitre" class="form-control" />
    
        <label for="">Ajouter vos questions</label>
        <input type="text" name="quizQuestion" class="form-control" />
        <div id="quizQuestion"></div>
        <input type="button" onclick="addQuestion()" value="Ajouter vos questions"/><br>

        <label for="">Choix de reponse</label>
        <input type="text" name="quizReponseChoix" class="form-control" />
        <div id="quizReponse"></div>
        <input type="button" onclick="addReponse()" value="Ajouter vos réponse"/><br>

        
        <label for="">Vrai Reponse</label>
        <input type="text" name="quizReponseVrai" class="form-control" />

        <button type="submit" class="btn btn-primary">Valider mon questionnaire</button>

    </div>
</form>