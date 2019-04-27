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

    <label class="form-control text-center font-weight-bold m-0">Categorie de l'article</label>
<select id="select" class="form-control mb-3" name="idCategorie">
                    <?php
                        
                        $categorieArticle = $pdo->query("SELECT * FROM categorie ORDER BY idCategorie");
                        while ($donnees = $categorieArticle->fetch()){ ?>
                        <option value="<?php echo $donnees->idCategorie; ?>"><?php echo $donnees->nomCategorie; ?></option>
                        <?php  } ?>
                        
                        
                </select>

    <button type="submit" class="btn btn-primary" name="validerLeTitre">Valider le titre</button>

</form>