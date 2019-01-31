<?php include_once 'inc/header.php';?>

<h1>Veuillez choisir un theme<h1>
    <h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>

<?php
// Permet de choisir le theme, les affiches tous du plus récent au plus ancien
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$choixDuTheme = $bdd->query('SELECT nomTheme,  idTheme FROM theme ORDER BY idTheme DESC');

echo '<form method="post" action="choixQuestionnaire.php">';
echo '<select name="choixTheme">';
while ($donnees = $choixDuTheme->fetch()){
?>

<option value="<?php echo $donnees['idTheme'];?>"><?php echo $donnees['nomTheme']; ?></option>
  
<?php
}
echo '</select>';
echo '<input type="submit" value="Choisir le theme" />';
echo '</form>';
