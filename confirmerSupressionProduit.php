<?php

$title = "Ecommerce - liste des voitures -";
ob_start();

    //COONEXION A LE BASE de DONNÉES
    $user = "root";
    $pass = "";
    //Essaie de te connecter
    try{
            $BD = new PDO("mysql:host=localhost;dbname=ecommerce;charset=utf8", $user, $pass);
            //Fonction static de la classe PDO pour debug la connexion en cas d'erreur
            $BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }catch(PDOException $exception){
        die("Erreur de connexion a PDO MySQL :" .$exception->getMessage());
    }

    //requet sql de suppression 
    $sql = "DELETE FROM voiture WHERE id_voiture = ?";
//Recup l'id passer dans l'url grace a la super globale $_GET <a herf=fichier.php?cle=valeur(dans la table produit (soit id_produit)>
$id = $_GET['id'];
echo "LA CLE PASSER DANS URL + SA VALEUR = " .$id;
//Creation d'une requète prépare pour lier l'element ? = $id
$supression = $BD->prepare($sql);
//Bind de $id à ?
$supression->bindParam(1, $id);
//Execution de la reqète
$supression->execute();

//Verification conditionnelle
if($supression){
    echo "<p class='alert-success p-5'>Le produit à bien été supprimé !</p>";
    echo "<a class='btn btn-success' href='listevoitures.php'>Retour a la liste des produits</a>";
}else{
    echo "<p class='alert-danger p-5'>Erreur lors de la supression du produit</p>";
}



$content = ob_get_clean();
require "template.php";
?>