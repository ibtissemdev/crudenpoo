<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once 'Contact.php';

$afficher= new Contact();
$resultat=$afficher->find($_GET['id']); ?>

<span>Nom : <?=$resultat['Nom']?> <br>
Prénom : <?=$resultat['Prenom']?> <br>
Portable: <?=$resultat['Telportable']?><br>

</body>
</html>





