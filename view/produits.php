<?php
session_start();
include_once("../connection/connexiondb.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="./connect.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <title>Produits</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper cyan lighten-2">
            <a href="../index.php" class="brand-logo"> <img class="materialboxed" width="70" src="../public/images/logoPhp.png">
            </a>
            <a href="../index.php" class="brand-logo center">The Villa</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../cart/panier.php" style="position: relative;"><i class="material-icons ">shopping_basket</i>
                        <span class="red-text" id="pspan">
                            <?php
                            if (isset($_SESSION['panier']) && is_array(($_SESSION['panier']))) {
                                echo array_sum($_SESSION['panier']);
                            } ?>
                        </span>
                    </a> </li>
                <li></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php
        $response = $conn->prepare('SELECT * FROM produits');
        $response->execute();
        while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <form action="">
                <div class="col s12 m2">
                    <h3 class="header amber-text text-lighten-2"><?php echo $row['produit_name']; ?></h3>
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="../public/images/<?php echo $row['produit-image']; ?>">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <p><?php echo $row['description'];  ?></p>
                                <p>
                                <h4 class="cyan-text"><?php echo $row['prix']; ?>$</h4>
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="../cart/ajout_panier.php?id=<?php echo $row['idproduits']; ?>" class="btn-floating btn-large waves-effect waves-light cyan"><i class="material-icons">add</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>

    <div class="footer-copyright cyan darken-1">
        <div class="container">
            © 2024 Copyright THE VILLA
        </div>
    </div>
    </footer>
</body>

</html>