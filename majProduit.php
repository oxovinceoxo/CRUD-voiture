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

//Requètes SQL
$sql = "SELECT * FROM voiture WHERE id_voiture = ?";
//Stock de la requète dans une vaiable ($requète) et appel de la connexion puis de la fonction requètée preparée
$requete = $BD->prepare($sql);
//Objet qui retourne PDO statement etat de la table produits à l'instant
//var_dump($requete);

$mise_a_jour_id = $_GET['id_maj'];
echo "ID du produit à mettre a jour = " .$mise_a_jour_id;
//Passage du ? à la valeur de $_GET['id_produi']
$requete->bindParam(1, $mise_a_jour_id);
//Execute la requète
$requete->execute();
//pour afficher les vaeurs de la tables produits on doit utiliser la fonction fectch = rechercher
$resultat = $requete->fetch();

if($resultat){

?>
<h1 class="text-center">CHANGER UNE VOITURE</h1>
<!-- Appel de la page du traitement du formulaire-->
<form action="validermaj.php?id_maj=<?= $resultat['id_voiture'] ?>" method="post">

    <!--LOGO DU PRODUIT-->
    <div class="form-group">
        <label for="logo">logo de la marque</label>
        <!--ICI on recup l'attibut name et sa valeur avec $_POST['logo_produit']-->
        <input type="text" value="<?= $resultat['logo'] ?>" class="form-control" id="logo" name="logo" required>
    </div>

    <!--MARQUE-->
    <div class="form-group">
        <!--ICI on recup l'attibut name et sa valeur avec $_POST['marque']-->
        <label for="marque">Marque de la voiture</label>
        <textarea  rows="3" class="form-control" id="marque" name="marque" required><?= $resultat['marque'] ?></textarea>
    </div>


    <!--PRIX-->
    <div class="form-group">
        <label for="prix">Prix de la voiture</label>
        <!--ICI on recup l'attibut name et sa valeur avec $_POST['prix']-->
        <input type="text" value="<?= $resultat['prix'] ?>"  step="4" class="form-control" id="prix" name="prix" required>
    </div>


    <div class="form-group mt-5">
        <!--ICI  le type submit appel le l'atribut action= du formulaire-->
        <button type="submit" class="btn btn-outline-success">Mettre à jour la voiture</button>
    </div>

</form>

<?php
}


//Appel du template
$content = ob_get_clean();
require "template.php";
?>