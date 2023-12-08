<?php
session_start();
if(empty($_POST['nom_utilisateur'])){
    echo "Le champ Pseudo est vide.";
} else {
    if(empty($_POST['mots_de_passe'])){
        echo "Le champ Mot de passe est vide.";
    } else {
        $Pseudo = htmlentities($_POST['nom_utilisateur'], ENT_QUOTES, "UTF-8");
        $MotDePasse = htmlentities($_POST['mots_de_passe'], ENT_QUOTES, "UTF-8");
        $mysqli = new mysqli("localhost","root","","php_formulaire");
        if(!$mysqli){
            echo "Erreur de connexion à la base de données.";
        } else {

            $Requete = mysqli_query($mysqli,"SELECT nom, prenom FROM user WHERE nom = '".$Pseudo."' AND prenom = '".$MotDePasse."'");
            if(mysqli_num_rows($Requete) == 0) {
                echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
            } else {
                $_SESSION['pseudo'] = $Pseudo;
                echo "Vous êtes à présent connecté !";


            }
            $utilisateur_authentifie = true;
            if ($utilisateur_authentifie) {
                echo "<p>Vous êtes à présent connecté !</p>";
                sleep(2);
                header("Location: connecter.html");
                exit();

            }


        }
    }

}
?>