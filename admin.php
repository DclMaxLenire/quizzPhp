<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

    <?php include 'inc/header.php'; 

    require 'inc/db.php';

    $statut = $_SESSION['auth']->statut;
    if($_SESSION['auth'] && $statut != 1) {
    header('Location: login.php');

    }

?>

    <h1>Vous etes sur une page admin</h1>

        <h5>Liste des membres</h5>

            <form method="POST">

                <button type="submit" name="afficherMembre">Afficher les membres</button>
                <button type="submit" name="fermerMembre">Fermer l'affichage des membres</button>
                <label for="">Entrer le pseudo de l'utilisateur a supprimer</label>
            </form>

            <form method="POST">
                <input type="text" name="deleteMembre" class="form-control" />
                <button type="submit" name="deleteMembreExecute">Supprimer l'utilisateur</button> 
            </form>

            <form method="POST" class="m-auto text-center" action="#">
    <div class="form-group col-12">
    <button class="btn btn-primary mb-3 col-4 col-lg-6" type="submit" name="afficherQuestionnaire">Afficher tous les questionnaires</button>
    <button class="btn btn-primary col-8 col-lg-6" type="submit" name="fermerQuestionnaire">Fermer l'affichage des questionnaires</button>
    </div>
</form>

<?php

// Afficher la liste des membres //
if(isset($_POST['afficherMembre']) && ([$_POST['fermerMembre']])) {
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$membre = $bdd->query('SELECT pseudo, email FROM membre ORDER BY idMembre DESC'); // Affiche tout les utilisateur du plus récent au plus ancien

// Affiche chaque membres
while ($donnees = $membre->fetch()){
echo '<p>NOM DU MEMBRE <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> 
: L\'ADRESSE MAIL DU MEMBRE <strong>'. htmlspecialchars($donnees['email']) . '</strong></p>';

}}


if(!empty($_POST['deleteMembre'])) {
// Suprime un utilisateur
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$membreDelete = $bdd->prepare('DELETE FROM membre WHERE pseudo = :pseudo');
$membreDelete->execute(['pseudo' => $_POST['deleteMembre']]);
}

if(isset($_POST['afficherQuestionnaire']) && ([$_POST['fermerQuestionnaire']])) {
$article = $pdo->query('SELECT * FROM questionnaire ORDER BY idQuestionnaire DESC');
$article->execute();

while ($donnees = $article->fetch())
{          
?>
<div class="card col-12 col-sm-12 col-md-8 col-lg-8 radius-10 m-auto">
<div class="card-body">
    <h5 class="card-title">
        <?php echo htmlspecialchars($donnees->titreQuestionnaire); ?>
    </h5>
    <p class="card-text">Etat du questionnaire 0 = invisible <b><?php echo $donnees->etat ?></b></p>
    <p class="card-text"><a href="voirQuestionnaire.php?idQuestionnaire=<?php echo $donnees->idQuestionnaire ?>">Voir le questionnaire</a></p>
    <p class="card-text"><a href="modificationQuestionnaireAdmin.php?idQuestionnaire=<?php echo $donnees->idQuestionnaire ?>">Modifier le questionnaire</a></p>
    <p class="card-text"><a href="supprimerQuestionnaire.php?idQuestionnaire=<?php echo $donnees->idQuestionnaire ?>">Supprimer le questionnaire</a></p>
</div>
</div>
<?php
}}
    
?>