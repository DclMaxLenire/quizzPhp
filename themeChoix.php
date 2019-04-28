<?php include_once 'inc/header.php';?>

<?php  if(isset($_SESSION['auth'])): ?>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"><h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->pseudo; ?></h5></li>
</ol>
</nav>

<?php else: ?>

<?php endif; ?>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"><h5>Veuillez choisir un theme</h5></li>
</ol>
</nav>

<?php
// Permet de choisir le theme, les affiches tous du plus récent au plus ancien
require 'inc/db.php';
?>
<form method="POST" action="choixQuestionnaire.php">

    <label class="form-control text-center font-weight-bold m-0">Choissier un theme</label>
<select id="select" class="form-control mb-3" name="idCategorie">
                    <?php
                        
                        $categorieArticle = $pdo->query("SELECT * FROM categorie ORDER BY idCategorie");
                        while ($donnees = $categorieArticle->fetch()){ ?>
                        <option value="<?php echo $donnees->idCategorie; ?>"><?php echo $donnees->nomCategorie; ?></option>
                        <?php  } ?>
                        
                        
                </select>

    <button type="submit" class="btn btn-primary">Valider le titre</button>

</form>
