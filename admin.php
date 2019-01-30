<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php include 'inc/header.php'; 
require 'inc/db.php';
$statut = $_SESSION['auth']->statutMembre;
if($_SESSION['auth'] && $statut == 0) {
header('Location: login.php');
}
?>
<h1>Vous etes sur une page admin<h1>
<h5>Liste des membres<h5>
<form method="POST">
<button type="submit" name="afficherMembre">Afficher les membres</button>
<button type="submit" name="fermerMembre">Fermer l'affichage des membres</button>
<label for="">Entrer le pseudo de l'utilisateur a supprimer</label>
<input type="text" name="deleteMembre" class="form-control" />
<button type="submit" name="deleteMembreExecute">Supprimer l'utilisateur</button> 
</form>

<?php
// Afficher la liste des membres //
if(isset($_POST['afficherMembre']) && ([$_POST['fermerMembre']])) {
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$membre = $bdd->query('SELECT nomMembre, emailMembre FROM membre ORDER BY idMembre DESC'); // Affiche tout les utilisateur du plus récent au plus ancien

// Affiche chaque membres
while ($donnees = $membre->fetch())
{
    echo '<p>NOM DU MEMBRE <strong>' . htmlspecialchars($donnees['nomMembre']) . '</strong> 
    : L\'ADRESSE MAIL DU MEMBRE <strong>'. htmlspecialchars($donnees['emailMembre']) . '</strong></p>';
}
}
?>

<?php
// Suprime un utilisateur
$bdd = new PDO('mysql:dbname=quizzBaseDeDonnee;host=localhost', 'maxLenireQuizz', '14759');
$membreDelete = $bdd->prepare('DELETE FROM membre WHERE nomMembre = :nomMembre');
$membreDelete->execute(['nomMembre' => $_POST['deleteMembre']]);
?>