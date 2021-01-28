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

<div class="text-center">
    <h1 class="text-dark text-center">le bon coin des voitures</h1>
    <h2 class="text-warning text-info">espace d'administration</h2>
    <a href="ajouterProduit.php" class="btn btn-outline-danger">AJOUTER UN PRODUIT</a><br>
    <a href="index.php" class="btn btn-outline-primary">Retour</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>logo</th>
            <th>marque</th>
            <th>prix</th>
        </tr>
    </thead>

<?php

$reponse = $BD->query('SELECT * FROM voiture'); 
while ($donnees = $reponse->fetch()) 

// test echo '<p>' . $donnees ['logo'] . '-' . $donnees ['marque'] . '-' . $donnees ['prix'] .'</p>';
{
    ?> 
    
    <tr>
    <td><img src="<?= $donnees['logo'] ?>" alt="<?= $donnees['logo'] ?>" title="<?= $donnees['logo'] ?>"/></td>
    <td><?php echo $donnees['marque'] ?></td>
    <td><?php echo $donnees['prix'] ?> €</td>
    <td><a href="detailsProduit.php?id_produit=<?= $donnees['id_voiture']  ?> " class="btn btn-success">Détails du produits</a></td>
    <td><a href="" class="btn btn-info">Mettre à jour le produits</a></td>
    <td><a href="suprProduit.php?id=<?= $donnees['id_voiture'] ?>" class="btn btn-danger">Supprimer le produits</a></td>
</tr>
<?php
}
?>



<?php
$content = ob_get_clean();
//Rappel du template sur chaque page
require "template.php";
?>