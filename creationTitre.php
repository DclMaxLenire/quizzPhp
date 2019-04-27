<?php
include 'inc/header.php'; 

if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->pseudo; ?></h5>
<?php else: ?>
<?php endif; ?>
<?php 
require 'inc/db.php';

?>



<form method="POST" action="creationQuestion.php">

    <label>Entrer le titre puis validé le</label>
    <input type="text" class="form-control" name="nomQuestionnaire">

    <?php
       $theme = $pdo->prepare('SELECT * categorie')
       



?>

    <button type="submit" class="btn btn-primary" name="validerLeTitre">Valider le titre</button>

</form>