<?php 
if(!empty($_POST) && !empty($_POST['userEmail'])) { // Verifie si c'est remplis pour ne pas aller chercher dans la base de donnée si il n'y a rien
    
    require_once 'inc/db.php';
    
    require_once 'inc/fonctions.php';
    
    $req = $pdo->prepare('SELECT * FROM membre WHERE emailMembre = ? AND confirmedDateMembre IS NOT NULL');
    
    $req->execute([$_POST['userEmail']]);
    
    $user = $req->fetch(); // Récupère l'utilisateur
    
    session_start();
    
    if($user){
        
        $resetToken = str_random(50);

        $req = $pdo->prepare('UPDATE membre SET resetToken = ?, resetTokenDate = NOW() WHERE idMembre= ?');
             
        $req = $req->execute([$resetToken, $user->idMembre]);

        $_SESSION['flash']['success'] = 'Vous pouvez changer de mot de passe via email';

        mail($_POST['userEmail'], 'Confirmation de changement de mot de passe', "Afin de valider votre compte merci de cliquer sur  le lien\n\nhttp://localhost/dev/quizzPhp/reset.php?id=$user->idMembre&token=$resetToken");
        
        header('Location: login.php');
        
        exit();
        
    } else {
        
        $_SESSION['flash']['danger'] = "Aucun compte ne correspond a cette email";

        header('Location: forget.php');

        exit();
}
}
?>
<?php require 'inc/header.php'; ?>

<h5>Mot de passe oublié<h5>
<form method="POST">
<label for="">Email</label>

<input type="email" name="userEmail" class="form-control" required/>

<button type="submit" class="btn btn-primary">Envoyer</button>
</form>