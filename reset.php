<?php
if(isset($_GET['id']) && ($_GET['token'])) {

require 'inc/db.php';

$req = $pdo->prepare('SELECT * FROM membre WHERE idMembre = ? AND resetToken = ? AND resetTokenDate > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');

$req->execute([$_GET['id'], $_GET['token']]);

$user = $req->fetch();

if($user) {
    if(!empty($_POST)) {
        if(!empty([$_POST]) && $_POST['userPassword'] == $_POST['userPasswordConfirm']) {

        $password = password_hash($_POST['userPassword'], PASSWORD_BCRYPT);

        $pdo->prepare('UPDATE membre SET motDePasseMembre = ?')->execute([$password]);

        session_start();

        $_SESSION['auth'] = $user;

        $_SESSION['flash']['success'] = "Votre mot de passe à était modifié";

        header('Location: login.php');

        exit();
       
} else {

    $_SESSION['flash']['danger'] = "Ce token n'est pas valide";
header('Location: login.php');

exit();



}
    }}}
?>
<?php include 'inc/header.php' ?>
<h5>Changer votre mot de passe</h5>

<form method="POST" action="">

<div class="form-group">

    <label for="">Mot de passe</label>
    <input type="password" name="userPassword" class="form-control" />

    <label for="">Confirmer votre mot de passe</label>
    <input type="password" name="userPasswordConfirm" class="form-control" />

    <button type="submit" class="btn btn-primary">Rénitialiser votre mot de passe</button>

</form>
