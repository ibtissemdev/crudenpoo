<?php 

require 'Model.php';

class Contact extends Model {

    protected $Id_utilisateur;
    protected $Nom;
    protected $Prenom;
    protected $Telportable;
    protected $Mail;
    protected $Sexe;
    protected $table='contact';
   
    public function getId_utilisateur()
    {
        return $this->Id_utilisateur;
    }

  
    public function setId_utilisateur($Id_utilisateur)
    {
        $this->Id_utilisateur = $Id_utilisateur;

        return $this;
    }
    public function getNom()
    {
        return $this->Nom;
    }

  
    public function setNom($Nom)
    {
        $this->Nom = $Nom;

        return $this;
    }
    public function getPrenom()
    {
        return $this->Prenom;
    }

  
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;

        return $this;
    }
    public function getTelportable()
    {
        return $this->Telportable;
    }

  
    public function setTelportable($Telportable)
    {
        $this->Telportable = $Telportable;

        return $this;
    }
    public function getMail()
    {
        return $this->Mail;
    }

  
    public function setMail($Mail)
    {
        $this->Mail = $Mail;

        return $this;
    }
    public function getSexe()
    {
        return $this->Sexe;
    }

  
    public function setSexe($Sexe)
    {
        $this->Sexe = $Sexe;

        return $this;
    }
 
}


?>