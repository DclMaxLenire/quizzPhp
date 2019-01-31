<?php include 'inc/header.php';?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>
<h5 class="text-center">Choissisez un questionnaire</h5>
<?php
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$idDuTheme = $_POST['choixTheme'];
$choixDuQuestionnaire = $bdd->query("SELECT idQuestionnaire , titreQuiz FROM questionnaire  WHERE idTheme='".$idDuTheme."'");

echo '<form method="post" action="question.php">';
echo '<select name="choixQuestionnaire">';
while ($donnees = $choixDuQuestionnaire->fetch()){
?>
<option value="<?php echo $donnees['idQuestionnaire'];?>"><?php echo $donnees['titreQuiz']; ?></option>    
<?php

}
echo '</select>';
echo '<input type="submit" value="Choisir le questionnaire" />';
echo '</form>';

?>