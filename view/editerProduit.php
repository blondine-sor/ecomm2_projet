<?php

session_start();
if (isset($_SESSION['item'])) {
    $id = $_SESSION['item']['id'];
    $name = $_SESSION['item']['produit_name'];
    $image = $_SESSION['item']['produit-image'];
    $desc = $_SESSION['item']['description'];
    $prix = $_SESSION['item']['prix'];
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
    <title>Ajout Produits</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper cyan lighten-2">
            <a href="../index.php" class="brand-logo"> <img class="materialboxed" width="70" src="../public/images/logoPhp.png">
            </a>
            <a href="../index.php" class="brand-logo center">The Villa</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../view/editionProduit.php">Retour</a></li>
                <li><a href="../view/produits.php">Produits</a></li>
            </ul>
        </div>
    </nav>
    <div class="container cyan accent-1">
        <div class="row">
            <form class="col s12" action="../controller/gestionProduitController.php" method="post">
                <h1>Editer Produits</h1>
                <input type="text" name="id" value=<?= $id ?> hidden>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" value=<?= $name ?> name="produit_name">
                        <label for="input_text">Nom Produit</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" multiple>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" name="produit_image" value=<?= $image ?> type="text" placeholder="Upload one or more files">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea" name="description" value=<?= $desc ?>></textarea>
                        <label for="textarea1">Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s2">
                        <input id="input_text" type="number" step="any" value=<?= $prix ?> name="prix" />
                        <label for="input_text">Prix</label>

                    </div>
                </div>
                <div class="right">
                    <button class="btn waves-effect waves-light blue" name="editer" type="submit" name="action">Ajouter
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

        </div>
    </div>
    <script>
        $('#textarea1').val('New Text');
        M.textareaAutoResize($('#textarea1'));
    </script>
</body>

</html>