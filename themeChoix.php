<?php include_once 'inc/header.php';?>

<?php  if(isset($_SESSION['auth'])): ?>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page"><h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5></li>
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
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$choixDuTheme = $bdd->query('SELECT nomTheme,  idTheme FROM theme ORDER BY idTheme DESC');
?>

<form method="post" action="choixQuestionnaire.php">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Choisissez et validez le theme</label>
            <select class="form-control" name="choixTheme">

<?php
while ($donnees = $choixDuTheme->fetch()){
?>

<option value="<?php echo $donnees['idTheme'];?>"><?php echo $donnees['nomTheme']; ?></option>
  
<?php
}
?>
</div>
</select>
    <input type="submit" value="Choisir le theme" />
</form>
