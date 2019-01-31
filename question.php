<?php include 'inc/header.php';

$idDuQuestionnaire = $_POST['choixQuestionnaire'];

// Affiche les questions du questionnaire choisis
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$afficheQuestion = $bdd->query("SELECT libelleQuestion_question ,  id_question , choixReponse_question FROM question WHERE fk_questionnaire='".$idDuQuestionnaire."' "); 

?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>
<?php
echo '<form method="post" action="">';
echo '<select name="choixQuestion">';
while ($donnees = $afficheQuestion->fetch()){
?>
<option value="<?php echo $donnees['id_question'];?>"><?php echo $donnees['libelleQuestion_question']; ?></option> 
<option value="<?php echo $donnees['id_question'];?>"><?php echo $donnees['choixReponse_question']; ?></option>   
<?php

}
echo '</select>';
echo '<input type="submit" value="Valider la réponse" />';
echo '</form>';
?>
<button type="submit" class="btn btn-primary"><a href="index.php">Retour accueil</a></button>