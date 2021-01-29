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
<div class="alert-danger p-5">
    <h1 class="text-center text-danger"><strong>ATTENTION</strong></h1>
    <h2 class="text-center text-dark">LE VOITURE CONCERNER VA ETRE SUPPRIMÉ</h2>

<?php
    //Requètes SQL
    $sql = "SELECT * FROM voiture WHERE id_voiture = ?";

    $requete = $BD->prepare($sql);
    //Récupération de id <a href=detailsProduit.php?id=<?= $row['id_voiture']
    //On stocke le resultat de $_GET['id_voiture'] =  dans une variable
    //Recupration de id dans url grace a la variable super globale $_GET
    $id = $_GET['id'];
    echo "LA CLE PASSER DANS URL + SA VALEUR = " .$id;
    //Passage du ? à la valeur de $_GET['id_voiture']
    $requete->bindParam(1, $id);
    //Execute la requète
    $requete->execute();
    //pour afficher les vaeurs de la tables voiture on doit utilisé la fonction fectch = rechercher
    $resultat = $requete->fetch();

    ?>
    <ul class="list-group">
        <li class="list-group-item">ID : <?= $resultat['id_voiture'] ?></li>
        <li class="list-group-item">LOGO : <img src="<?= $resultat['logo'] ?>" alt="<?= $resultat['logo'] ?>" title="<?= $resultat['logo'] ?>">  </li>
        <li class="list-group-item">MARQUE : <?= $resultat['marque'] ?></li>
        <li class="list-group-item">PRIX : <?= $resultat['prix'] ?> €</li>
    </ul>

    <a href="confirmerSupressionProduit.php?id=<?=$resultat['id_voiture'] ?>" class="btn btn-danger mt-5">CONFIRMER LA SUPRESSION DE LA VOITURE = <?= $resultat['marque'] ?></a>


</div>

    <a href="listevoitures.php" class="btn btn-dark mt-5">ANNULER</a>


<?php

$content = ob_get_clean();
require "template.php";
?>