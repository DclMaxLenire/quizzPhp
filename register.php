<?php
 require_once 'inc/fonctions.php';
if(!empty($_POST)) { // Si défférent de vide lance le reste

    $errors = array();

    require_once 'inc/db.php'; // Require la connexion a la base de donnée
    
    if(empty($_POST['userName']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['userName'])) { // Si pseudo vide ou mauvais caractères

        $errors['userName'] = "Votre Pseudo n'est pas valide";
        
    } else {

        $req =$pdo->prepare('SELECT id FROM usersInformations WHERE username = ?');

        $req->execute([$_POST['userName']]);

        $email = $req->fetch();

        if($user){

        $errors['userName'] = 'Ce pseudo est déjà pris';


        }

    }

    if(empty($_POST['userEmail']) || !filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)){ // Si userEmail vide ou adress mail invalide

        $errors['userEmail'] = "Votre Email n'est pas valide";

        
}   else {

        $req =$pdo->prepare('SELECT id FROM usersInformations WHERE email = ?');

        $req->execute([$_POST['userEmail']]);

        $email = $req->fetch(); // Stop a la première ligne identique

        if($email){

        $errors['userEmail'] = 'Cette email est déjà utilisé pour un autre compte';


    }

    if(empty($_POST['userPassword']) || $_POST['userPassword'] != $_POST['userPasswordConfirm']) { // Si userPassword vide ou userPasswordConfirm différent du userPassword

        $errors['userPassword'] = "Vous devez entrer un mot de passe valide";
        debug($errors);
    } 

    if(empty($errors)) { // SI pas d'erreurs dans la totalité des inputs

    
    $req = $pdo->prepare("INSERT INTO usersInformations SET username = ?, password = ?, email = ?, validationToken= ?"); // Insert dans la bdd mais pas directement pour des questions de sécurités
    
    $password = password_hash($_POST['userPassword'], PASSWORD_BCRYPT); // Crypte le mot de passe 

    $token = str_random(50);

    $req->execute([$_POST['userName'], $password, $_POST['userEmail'], $token]); // Insert cette fois dans la base de donnée

    $userId = $pdo->lastInsertId();

    mail($_POST['userEmail'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur  le lien\n\nhttp://localhost/dev/quizzPhp/inc/confirm.php?id=$userId&token=$token");

    header('Location: login.php');
    
    exit();

    }
}
}


?>
<?php include_once 'inc/header.php' ?>

<h1>S'inscire</h1>

<?php if(!empty($errors)) ?> <!---- Si erreur est different de vide lance un boucle qui montre les erreurs -------------------------->

<div class="alert alert-danger">

    <p>Vous n'avez pas rempli le formulaire correctement</p>

    <?php foreach($errors as $error): ?>

    <li><?= $error; ?></li>

<?php endforeach; ?>

</div>


<form method="POST" action="">

<div class="form-group">

    <label for="">Pseudo</label>
    <input type="text" name="userName" class="form-control" />

    <label for="">Email</label>
    <input type="text" name="userEmail" class="form-control" />


    <label for="">Mot de passe</label>
    <input type="password" name="userPassword" class="form-control" />


    <label for="">Confirmer votre mot de passe</label>
    <input type="password" name="userPasswordConfirm" class="form-control" />

    <button type="submit" class="btn btn-primary">M'inscrire</button>

</form>


<?php require 'inc/footer.php' ?>