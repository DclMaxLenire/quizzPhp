<?php include 'inc/header.php'; ?>
<?php 
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$membreDelete = $bdd->prepare('DELETE FROM membre WHERE nomMembre = :nomMembre');
$membreDelete->execute(['nomMembre' => $_POST['deleteMembre']]);
?>

<form method="POST" action="">

<div class="form-group">

    <label for="">Theme du quizz</label>
    <input type="text" name="quizTheme" class="form-control" />

    <label for="">Titre du quizz</label>
    <input type="text" name="quizTitre" class="form-control" />
    
    <label for="">Ajouter vos questions</label>
    <div id="quizQuestion"></div>
    <input type="button" onclick="addQuestion()" value="Ajouter vos questions"/><br>

    <label for="">Choix de reponse</label>
    <div id="quizReponse"></div>
    <input type="button" onclick="addReponse()" value="Ajouter vos réponse"/><br>

    
    <label for="">Vrai Reponse</label>
    <input type="text" name="quizReponseVrai" class="form-control" />

    <button type="submit" class="btn btn-primary">Valider mon questionnaire</button>

</form>