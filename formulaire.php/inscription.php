<?php

$user = "root";
$pass = "";


$php_formulaire = new PDO('mysql:host=localhost;dbname=php_formulaire;charset=utf8', $user, $pass);
$php_formulaire->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $php_formulaire = new PDO('mysql:host=localhost;dbname=php_formulaire;charset=utf8', $user, $pass);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());

}
$nom = $_POST["nom_utilisateur"];
$prenom = $_POST["prenom"];
$age = $_POST["age"];
$profession = $_POST["VotreProfession"];
$pays = $_POST["Votrepays"];
$req = $php_formulaire->prepare('INSERT INTO user(nom, prenom,age,metier,pays) VALUES(:nom, :prenom,:age,:metier,:pays)');
$req->execute(array(

    'nom' => $nom,

    'prenom' => $prenom,

    'age' => $age,

    'metier' => $profession,

    'pays' => $pays

));
echo 'La personne a bien été ajouté !';


$php_formulaire = new PDO('mysql:host=localhost;dbname=php_formulaire;charset=utf8', $user, $pass);
$reponse = $php_formulaire->prepare('SELECT *  FROM user');
$reponse->execute();
$donne = $reponse->fetchAll();

var_dump($donne);

echo $donne['nom'];

$reponse->closeCursor();

