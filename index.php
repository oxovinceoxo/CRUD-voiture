<?php
$title = "Ecommerce - ACCEUIL voiture -";


?>
    <h1 class="text-dark text-center">le bon coin des voitures</h1>
    <div class="text-center">
         <p><a href="listevoituresclient.php" class="btn btn-outline-success">Client</a></p>
         <p><a href="listevoitures.php" class="btn btn-outline-danger">Administrateur</a></p>
                <a href="listevoitures.php"></a>
    </div>

<?php
$content = ob_start();
require "template.php";