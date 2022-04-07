<?php
require 'Contact.php'; 

$contact= new Contact;
$resultat=$contact->findAll(); 

for($i=0 ; $i<count($resultat) ; $i++) {?>

<span>Nom : <?=$resultat[$i]['Nom']?> <br>
Prénom : <?=$resultat[$i]['Prenom']?> <br>
Portable: <?=$resultat[$i]['Telportable']?><br>
<a href="afficher.php?id=<?=$resultat[$i]['Id']?>">Afficher </a></span><br>
<a href="Formulaire.php?id=<?=$resultat[$i]['Id']?>">Modifier </a></span><br>
<a href="index.php?id=<?=$resultat[$i]['Id']?>">Supprimer </a></span><br>
<?php 
} ?>

<a href="Formulaire.php"> Ajouter</a>
 <?php
$envoyer=@$_POST['envoyer'];
unset($_POST['envoyer']);



if (!isset($envoyer) && isset($_GET['id'])){
$suprimer=$contact->delete($_GET['id']); 
header('Location:index.php');
}



?>


