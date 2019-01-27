<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

function debug($variable){

echo '<pre>' . print_r($variable, true) . '</pre>';

}


function str_random($length){ // $Length c'est la taille choisis dans la fonction

$alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN"; // Pioche parmis tout les caractères 

return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length); // Nous renvoi la clé

}



?>