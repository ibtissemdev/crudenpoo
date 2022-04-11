<?php 
require 'Contact.php'; 
if (isset($_GET['id'])) {
  $select_par_id= new Contact;
  $resultat = $select_par_id->find($_GET['id']);

}

?>

<!DOCTYPE html>
<html lang="fr,en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="./memory.css" rel="stylesheet">

  <title>Ajout contact</title>
</head>
<?php 

?>
<body>

  <div class="container-sm">

<div class="raw">

<?php
        extract($_GET); ?>
    <h1> <?= (isset($id) && !empty($id)) ? "Modifier ": "Ajouter"?> un contact</h1>

 
    <!-------------------------------------bouton de connection  ------------------->
  

    <!------------------------ Formulaire ajout contact ------------------------->

    <form action="" method="post" class=" vertical-alignment">

    <input type="hidden" name="Id" value="<?= $resultat['Id']; ?>">
    
            <div class="col">
              <label for="nom" class="form-label">Nom</label>
              <input type="text"  pattern="^[A-Za-zéè '-]+$" class="form-control" value="<?php if (isset($id)) {echo $resultat['Nom'];} ?>" name="Nom" id="nom" maxlength="20" placeholder="Nom" required>
            </div>
            
            
            <div class="col">
              <label for="prenom" class="form-label">Prénom</label>
              <input type="text" requierd pattern="^[A-Za-zéè '-]+$" class="form-control" name="Prenom" value="<?php if (isset($id)) {echo $resultat['Prenom'];} ?>" id="prenom"  maxlength="20" placeholder="Prénom" required>
            </div>


            <div class="col">
              <label for="mail" class="form-label">Mail</label>
              <input type="email" requierd class="form-control" name="Mail" value="<?php if (isset($id)) {echo $resultat['Mail'];} ?>" id="mail" placeholder="E-mail" required>
            </div>


    <div class="col">
    <label for="telportable" class="form-label">Numéro de portable</label>
    <input type="tel" class="form-control" name="Telportable" id="telportable" value="<?php if (isset($id)) {echo $resultat['Telportable'];} ?>" placeholder="01 23 45 67 89" minlength="9" maxlength="14" required>
    </div>

    <!-------------------crée un choix dans le formulaire ------------->    
    <div class="col">
    <label for="Sexe"  class="form-label">Sexe</label>
    <select id="Sexe"  name="Sexe"  class="form-select">
    <?= (isset($id))  ? "<option >" . $resultat['Sexe'] . "</option>" : "<option disabled selected hidden>Sexe</option>" ?>
    <option value="homme" >Homme</option>
    <option value="femme">Femme</option>
    </select>
    </div>

    <!----------------------------------crée un boutton ajouter dans une div ---------->
       
    <div class="col">
    <button type="envoyer" name="envoyer" class="btn-primary text-center "  <?=(isset($id)) ? 'value="modifier"': 'value="ajouter"'?>> <?=(isset($id)) ? 'Modifier': 'Ajouter'?></button>
    </div>
    </form>
    </div>
    </div>
<?php

$contact = new Contact;
// if(isset())

if (!empty($_POST)) {
$envoyeContact=$contact->setNom($_POST['Nom'])
->setPrenom($_POST['Prenom'])
->setMail($_POST['Mail'])
->setTelportable($_POST['Telportable'])
->setSexe($_POST['Sexe']);

if (isset($_GET['id'])) {
  $contact->update($_GET['id'],$envoyeContact);
  } else {
    $contact->insert($envoyeContact);
  }
  header('Location:index.php');
}

?>
    </body>
    </html>