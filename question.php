<?php include 'inc/header.php';

$idDuQuestionnaire = $_POST['choixQuestionnaire'];

// Affiche les questions du questionnaire choisis
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$afficheQuestion = $bdd->query("SELECT libelleQuestion_question ,  id_question , choixReponse_question FROM question WHERE fk_questionnaire='".$idDuQuestionnaire."' "); 

?>
<?php  if(isset($_SESSION['auth'])): ?>
<h5 class="text-center">Vous etes connectez sur le compte de <?= $_SESSION['auth']->nomMembre; ?></h5>
<?php else: ?>
<?php endif; ?>
<?php
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$afficheReponse = $bdd->query("SELECT choixReponse_question FROM question WHERE fk_questionnaire='".$idDuQuestionnaire."' "); 

$monJSON = json_encode($afficheReponse);
$monJSONHEU = json_decode($monJSON, true);
print $monJSONHEU['proposition1'];
echo '<form method="post" action="reponse.php">';
while ($donnees = $afficheQuestion->fetch()){



?>
<p value="<?php echo $donnees['id_question'];?>"><?php echo $donnees['libelleQuestion_question']; ?></p> 
<input type="radio" value="<?php echo $donnees['id_question'];?>"><?php echo $donnees['choixReponse_question']; ?>
<?php

}

echo '<input type="submit" value="Valider les réponses réponse" />';
echo '</form>';
?>
<button type="submit" class="btn btn-primary"><a href="index.php">Retour accueil</a></button>