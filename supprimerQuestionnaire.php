<?php

require 'inc/db.php';

$idQuestionnaire = $_GET['idQuestionnaire'];

$req = $pdo->prepare('DELETE FROM questionnaire WHERE idQuestionnaire = :idQuestionnaire AND all descendants');
$req->bindParam(':idQuestionnaire', $idQuestionnaire);
$req->execute();

header('Location: account.php');



?>