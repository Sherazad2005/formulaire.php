<?php

$user = "root";
$pass = "";


$php_formulaire = new PDO('mysql:host=localhost;dbname=php_formulaire;charset=utf8', $user, $pass);
$php_formulaire->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM members";
$stmt = $php_formulaire->prepare($sql);
$stmt->execute();

$members = $stmt->fetchAll(PDO::FETCH_ASSOC);