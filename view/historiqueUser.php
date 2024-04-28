<?php
session_start();
include_once("../connection/connexiondb.php");

if (isset($_SESSION['connected-user'])) {
    $id = $_SESSION['connected-user']['userid'];
    try {
        $query = $conn->prepare("SELECT produits.produit_name FROM produits JOIN commande ON produits.idproduits=commande.produits_idproduits AND commande.user_iduser='$id'");
        $query->execute();
        $products = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row['produit_name'];
        }
    } catch (PDOException $e) {
        echo "Erreur de Requete" . $e->getMessage();
    }
} else {
    echo "Connecter Vous!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Historique</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper cyan lighten-2">
            <a href="../index.php" class="brand-logo"> <img class="materialboxed" width="70" src="../public/images/logoPhp.png">
            </a>
            <a href="../index.php" class="brand-logo center">The Villa</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            </ul>
        </div>
    </nav>
    <section>
        <h2><span class="header"> Historique</span></h2>
        <table class="stripped highlight">
            <thead class="cyan">
                <tr>
                    <th>Nom Produits</th>
                </tr>
            </thead>
            <?php foreach ($products as $product) : ?>
                <tbody>
                    <td><?= $product ?></td>
                </tbody>
            <?php endforeach; ?>
    </section>
</body>

</html>