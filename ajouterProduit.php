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

?>

<h1 class="text-center">AJOUTER UNE VOITURE</h1>
<!-- Appel de la page du traitement du formulaire-->
<form action="enregistrerProduit.php" method="POST">

    <!--LOGO DU PRODUIT-->
    <div class="form-group">
        <label for="logo">Logo de la voiture</label>
        <!--ICI on recup l'attibut name et sa valeur avec $_POST['logo']-->
        <input type="text" class="form-control" id="logo" name="logo" required>
    </div>

    <!--MARQUE DE LA VOITURE-->
    <div class="form-group">
        <!--ICI on recup l'attibut name et sa valeur avec $_POST['marque']-->
        <label for="marque">Marque de la voiture</label>
        <textarea rows="2" class="form-control" id="marque" name="marque" required></textarea>
    </div>

    <!--PRIX DE LA VOITURE-->
    <div class="form-group">
        <label for="prix">Prix du produit</label>
        <!--ICI on recup l'attibut name et sa valeur avec $_POST['prix']-->
        <input type="text"  step="4" class="form-control" id="prix" name="prix" required>
    </div>


    <div class="form-group mt-5">
        <!--ICI  le type submit appel le l'atribut action= du formulaire-->
        <button type="submit" class="btn btn-outline-success">Ajouter le produit</button>
    </div>

</form>

<?php
$content = ob_get_clean();
//Rappel du template sur chaque page
require "template.php";
?>