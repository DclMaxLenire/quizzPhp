<?php include 'inc/header.php';?>

<?php  if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>
<?php else: ?>
<?php endif; ?>
    <h5 class="text-center">Choissisez un questionnaire</h5>

<?php

require 'inc/db.php';

$idCategorie = $_POST['idCategorie'];

$article = $pdo->prepare('SELECT * FROM questionnaire WHERE idCategorie = :idCategorie AND etat = 1');
$article->bindParam(':idCategorie', $idCategorie);
$article->execute();

while ($donnees = $article->fetch())
{          
?>
<div class="card col-12 col-sm-12 col-md-8 col-lg-8 radius-10 m-auto">
<div class="card-body">
    <h5 class="card-title">
        <?php echo htmlspecialchars($donnees->titreQuestionnaire); ?>
    </h5>
    <p class="card-text"><a href="jouerQuestionnaire.php?idQuestionnaire=<?php echo $donnees->idQuestionnaire ?>">Jour le questionnaire</a></p>
</div>
</div>
<?php
}
    
?>