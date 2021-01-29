<?php

ob_start();
$mot_de_passe = "admin";

if(isset($_POST['password']) && !empty($_POST['password'])){
    var_dump($_POST["password"]);
    if($mot_de_passe == $_POST['password']){
        echo "<a href='listevoitures.php'>acceder aux voitures</a>";
    
    }else{
        //Si mot passe invalide
        echo "<p>Erreur votre email ou mot de passe sont invalide ou des sont vide</p>";
        echo "<a href='index.php'>Retour</a>";
    }
}else{
    //Si mot de passe invalide
    echo "ERREUR : Merci de renter un mot de passe valide ou de remplir tous les champ</p>";
    echo "<a href='index.php'>Retour</a>";
}

?>