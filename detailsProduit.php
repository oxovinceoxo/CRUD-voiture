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

<h1>DETAILS DU PRODUITS </h1>
<a href="listevoitures.php" class="btn btn-dark mt-5">Retour à la liste des voitures</a>
<?php
//Requètes SQL
$sql = "SELECT * FROM voiture WHERE id_voiture = ?";
//je Stock de la requète dans une vaiable ($requète) et appel de la connexion puis de la fonction requètée preparée
$requete = $BD->prepare($sql);

$id = $_GET['id_voiture'];
//Passage du ? à la valeur de $_GET['id_produi']
$requete->bindParam(1, $id);

$requete->execute();
//pour afficher les vaeurs de la tables produits on doit utilisé la fonction fectch(lister)
$resultat = $requete->fetch();

if($resultat){
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>logo</th>
                    <th>marque</th>
                    <th>prix</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $resultat['id_voiture'] ?></td>
                    <td><img src="<?= $resultat['logo'] ?>" alt="<?= $resultat['logo'] ?>" title="<?= $resultat['logo'] ?>">  </td>
                    <td><?= $resultat['marque'] ?></td>                    
                    <td><?= $resultat['prix'] ?> €</td>
                </tr>
            </tbody>
        </table>
    <?php
}else{
    echo "<p class='alert-danger p-5'>Erreur : cet ID (produit) n'existe pas</p>";
}

?>
<?php
echo "ICI c id de la voiture : " .$id;
var_dump($id);

var_dump($_GET['id_voiture']);

$content = ob_get_clean();
require "template.php";