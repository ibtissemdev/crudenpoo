<?php

class Model
{
  protected $table;
  protected $pdo;

  public function __construct()
  {
    $this->pdo = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '', [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  }
 
  public function findAll()
  {
    
    $sth = $this->pdo->prepare("SELECT * From $this->table ");
    $sth->execute();
    $resultat = $sth->fetchAll(); //Afficher toutes les entrées (un tableau) dans le tableau
    return $resultat;
  }

  public function find($id)
  {
    $sth = $this->pdo->prepare("SELECT * From $this->table WHERE Id=$id");
    $sth->execute();
    $resultat = $sth->fetch(); //Afficher toutes les entrées (un tableau) dans le tableau
    return $resultat;
  }

  public function delete($id)
  {
    $sth = $this->pdo->prepare("DELETE FROM $this->table WHERE Id=$id");
    $sth->execute();

  }

  public function Insert(Model $data)
  {
    $keys=[];
      $champs=[];
      $values=[];
      
    foreach ($data as $key => $value) {
      if($value != null && $key!= 'table' && $key!='pdo') {
      $keys[] = $key;
      $champs[] = '?';
      $values[] = $value;
    }
  }
    $keys = implode(",", $keys);
    $champs = implode(",", $champs);
    $sth = $this->pdo->prepare("INSERT INTO $this->table ($keys) VALUES ($champs)");
    $sth->execute($values);
  }

  public function update($id,$data)
  {

    //MODIFIER

    $keys=[];
    $values=[];
    
  foreach ($data as $key => $value) {
    if($value != null && $key!= 'table' && $key!='pdo') {
    $keys[] = "$key = ?";
    $values[] = $value;
  }
}
  $values[]=$id;
  $keys = implode(",", $keys);
  $sth = $this->pdo->prepare("UPDATE $this->table SET $keys WHERE Id = ?");
  $sth->execute($values);
}
  }

