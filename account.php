<?php require 'inc/header.php'; ?>

<?php 
loggedOnly();
?>
        <h2 class="text-center">Mon compte</h2>
        <h5 class="text-center">Bonjour  <?= $_SESSION['auth']->pseudo; ?></h5>

            <div class="container">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"> <a class="nav-link" href="themeChoix.php">Répondre à un questionaire</a></li>
            </ol>
            </nav>

        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a class="nav-link" href="creationTitre.php">Crée un questionaire</a></li>
        </ol>
        </nav>
    
<form method="POST" class="m-auto text-center" action="#">
<div class="form-group col-12">
<button class="btn btn-primary mb-3 col-4 col-lg-6" type="submit" name="afficherQuestionnaire">Afficher mes questionnaires</button>
<button class="btn btn-primary col-8 col-lg-6" type="submit" name="fermerQuestionnaire">Fermer l'affichage des questionnaires</button>
</form>


<?php

require 'inc/db.php';

$idMembre = $_SESSION['auth']->idMembre;

if(isset($_POST['afficherQuestionnaire']) && ([$_POST['fermerQuestionnaire']])) {
$article = $pdo->prepare('SELECT * FROM questionnaire WHERE idMembre = :idMembre');
$article->bindParam(':idMembre', $idMembre);
$article->execute();

while ($donnees = $article->fetch())
{          
?>
<div class="card col-12 col-sm-12 col-md-8 col-lg-8 radius-10 m-auto">
<div class="card-body">
    <h5 class="card-title">
        <?php echo htmlspecialchars($donnees->titreQuestionnaire); ?>
    </h5>
    <p class="card-text">Titre questionnaire<b><?php echo $donnees->idMembre ?></b></p>
    <p class="card-text"><em> Id idCategorie <b><?php echo $donnees->idCategorie ?></b></em></p>
    <p class="card-text"><a href="voirQuestionnaire.php?idQuestionnaire=<?php echo $donnees->idQuestionnaire ?>">Voir mon questionaire</a></p>
    <p class="card-text"><a href="modificationQuestionnaire.php?idQuestionnaire=<?php echo $donnees->idQuestionnaire ?>">Modifier mon questionaire</a></p>
    <p class="card-text"><a href="supprimerQuestionnaire.php?idQuestionnaire=<?php echo $donnees->idQuestionnaire ?>">Supprimer mon questionnaire</a></p>
</div>
</div>
<?php
}}
    
?>

<?php 
include_once 'inc/db.php';

$statut = $_SESSION['auth']->statut;
if($_SESSION['auth'] && $statut == 1) {

?>

        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a class="nav-link" href="admin.php">Aller sur la page admin</a></li>
        </ol>
        </nav>
        </div>
<?php

}

require 'inc/footer.php'; ?>