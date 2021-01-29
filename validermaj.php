<?php

$title = "Ecommerce - valider mise a jour voiture -";
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


if(isset($_POST['logo']) && !empty($_POST['logo'])){
    $logo = htmlspecialchars(strip_tags($_POST['logo']));
}else{
    //Sinon on affiche une erreur
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ nom du produit</p>";
}
//Recuperation de la marque
    if(isset($_POST['marque']) && !empty($_POST['marque'])){
        $marque = htmlspecialchars(strip_tags($_POST['marque']));
}else{
    //Sinon on affiche une erreur
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ nom du produit</p>";
}

//Recuperation du prix
if(isset($_POST['prix']) && !empty($_POST['prix'])){
    $prix = htmlspecialchars(strip_tags($_POST['prix']));
    //var_dump($prix);
}else{
    echo "<p class='alert-danger'>Erreur, merci de remplir le champ prix du produit</p>";
}

$sql="UPDATE voiture SET logo=?, marque=?, prix=? WHERE id_voiture = ?";
//verification des parametres avant execution
$requete = $BD->prepare($sql);
// ?=1 
$requete->bindParam(1, $logo);
$requete->bindParam(2, $marque);
$requete->bindParam(3, $prix);

$id = $_GET['id_maj'];
var_dump($id);

$res=$requete->execute(array($logo, $marque, $prix, $id));

var_dump($res);
if($res){
    //Message de réusite + bouton de retour à la liste
    echo "<p class='alert-success'>Votre voiture à bien été ajouté !</p>";
    echo "<a href='listevoitures.php' class='btn btn-outline-success'>Retour à la liste des produit</a>";
}else{
    echo "<p class='alert-danger'>Erreur: Merci de remplir tous les champs</p>";
}


//Appel du template
$content = ob_get_clean();
require "template.php";
?>