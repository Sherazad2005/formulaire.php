<?php

$user = "root";
$pass = "";
$user = $_POST['id_user'];
$metier=$_POST['metier'];


$php_formulaire = new PDO('mysql:host=localhost;dbname=php_formulaire;charset=utf8', $user, $pass);
$php_formulaire->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$membres = $php_formulaire->query("SELECT  id_user,nom, prenom FROM user");
while ($row = $membres->fetch_assoc()) {
    echo "<option value='" . $row['id_user'] . "'>" . $row['nom'] . "'>" . $row['prenom'] . "</option>";
}

$req = $php_formulaire->prepare('INSERT INTO user(metier) VALUES(troisD) WHERE id_user = ');
$req->execute(array(


    ':troisD' => $metier,



));
    $php_formulaire->close();

?>




