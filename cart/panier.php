<?php

session_start();
include_once("../connection/connexiondb.php");

if (isset($_SESSION['connected-user'])) {
    $prenom = $_SESSION['connected-user']['prenom'];
}

if (isset($_GET['del'])) {
    $id_del = $_GET['del'];
    unset($_SESSION['panier'][$id_del]);
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

    <title>Panier</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper cyan lighten-2">
            <a href="../index.php" class="brand-logo"> <img class="materialboxed" width="70" src="../public/images/logoPhp.png">
            </a>
            <a href="../index.php" class="brand-logo center">The Villa</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../view/produits.php">Boutique</a></li>
            </ul>
        </div>
    </nav>
    <section>
        <h2><span class="header"> Shopping Cart <?php echo isset($_SESSION['connected-user']) ? $prenom : "Connectez Vous SVP" ?></span></h2>
        <table class="stripped highlight" border="1">
            <thead class="cyan">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th></th>
                </tr>
            </thead>
            <?php
            $total = 0;
            if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                $ids = array_keys($_SESSION['panier']);
            }
            if (empty($ids)) {
                echo "votre panier est vide";
            } else {
                $produits = $conn->prepare("SELECT * FROM produits WHERE idproduits IN(" . implode(',', $ids) . ")");
                $produits->execute();

                foreach ($produits as $produit) :
                    $total = $total + $produit['prix'] * $_SESSION['panier'][$produit['idproduits']];

            ?>
                    <tbody>
                        <tr>
                            <td><img src="../public/images/<?= $produit['produit-image'] ?>" alt=""></td>
                            <td><?= $produit['produit_name'] ?> </td>
                            <td>$<?= $produit['prix'] ?></td>
                            <td><?= $_SESSION['panier'][$produit['idproduits']] ?></td>
                            <td><a href="panier.php?del=<?= $produit['idproduits'] ?>" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">remove_circle</i></a></td>
                        </tr>
                    </tbody>
            <?php
                endforeach;
            }
            ?>
            <tfoot>
                <tr>
                    <th class="header h4">ToTal :$<?= $total ?></th>
                </tr>
            </tfoot>
        </table>
    </section>
</body>

</html>