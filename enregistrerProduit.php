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

//Recuperation de input name = logo
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

//j'écris la reqète SQL insert into pour rajouter une voiture

$sql = "INSERT INTO voiture (logo, marque, prix, ) VALUES (?,?,?)";
//Creation d'une requète péparée avec la fonction prepare de PDO qui execute la requète SQL
$requete_insertion = $BD->prepare($sql);

$requete_insertion->bindParam(1, $logo);
$requete_insertion->bindParam(2, $marque);
$requete_insertion->bindParam(3, $prix);



//Si l'insertion fonctionne
if($requete_insertion->execute(array($logo, $marque, $prix,))){
    //Message de réusite + bouton de retour à la liste
    echo "<p class='alert-success'>Votre voiture à bien été ajouté !</p>";
    echo "<a href='listeProduit.php' class='btn btn-outline-success'>Retour à la liste des voiture</a>";
}else{
    echo "<p class='alert-danger'>Erreur: Merci de remplir tous les champs</p>";
}
?>

<?php
$content = ob_get_clean();
//Rappel du template sur chaque page
require "template.php";
?>