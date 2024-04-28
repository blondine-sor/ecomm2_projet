<?php
session_start();

if (isset($_SESSION['connected-user'])) {
    $iduser = $_SESSION['connected-user']['userid'];
    $token = $_SESSION['connected-user']['token'];
    $nom =  $_SESSION['connected-user']['nom'];
    $prenom =  $_SESSION['connected-user']['prenom'];
    $profil =  $_SESSION['connected-user']['profil'];
    $telephone = $_SESSION['connected-user']['telephone'];
    $adresse = $_SESSION['connected-user']['adresse'];
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
    <link type="text/css" rel="stylesheet" href="./view/connect.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
    </script>
    <title>The Villa</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper cyan lighten-2">
            <a href="#" class="brand-logo"> <img class="materialboxed" width="70" src="./public/images/logoPhp.png">
            </a>
            <a href="#" class="brand-logo center">The Villa</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="./cart/panier.php" style="position: relative;"><i class="material-icons ">shopping_basket</i>
                        <span class="red-text" id="pspan">
                            <?php
                            if (isset($_SESSION['panier']) && is_array(($_SESSION['panier']))) {
                                echo array_sum($_SESSION['panier']);
                            } ?>
                        </span>
                    </a>

                </li>
                <li><a href="./controller/connexionController.php">Connexion</a></li>
                <li><a href="./controller/inscriptionUserController.php">Inscriptions</a></li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col s7 ">
            <div class="card">
                <div class="card-image">
                    <img src="./public/images/villaII.jpg">
                    <span class=" card-title">Welcome to The Villa</span>
                </div>
                <div class="card-content">
                    <p>We are very proud to serve our clients with the hottest vacation villas of the world.
                        Our villas and mansions are affordable for your family vacations or your friend trips.
                    </p>
                </div>
                <div class="card-action">
                    <a href=<?php echo isset($_SESSION['connected-user']) ? "./view/produits.php" : './controller/connexionController.php' ?>>Don't Hesitate And Reserve</a>
                </div>
            </div>
        </div>
        <div class="col s5  ">
            <ul id="slide-out" class="sidenav">
                <li>
                    <div class="user-view">
                        <?php echo isset($_SESSION['connected-user']) ? "Bienvenue " . $prenom : ""    ?>
                        <br />
                        <a id="confirmation" href="./utils/popup.php" onclick="test()" class="amber-text text-lighten-3 disconn">Deconnexion</a>

                    </div>
                </li>
                <li><a href="<?php echo isset($_SESSION['connected-user']) ? "./view/profil.php" : './controller/connexionController.php' ?>">
                        <i class="material-icons">cloud</i>Profil</a></li>
                <li><a href="<?php if (isset($_SESSION['connected-user'])) {
                                    if ($profil == 1) echo "./controller/gestUserController.php";
                                    else echo "#";
                                } ?>">Gestion Utilisateurs</a></li>
                <li>
                    <div class="divider"></div>
                </li>
                <li><a class="subheader">Boutique</a></li>
                <li><a class="waves-effect" href="<?php if (isset($_SESSION['connected-user'])) {
                                                        if ($profil == 1) echo './controller/ajouProduitController.php';
                                                        else echo './view/produits.php';
                                                    } else {
                                                        echo './controller/connexionController.php';
                                                    } ?>"><i class="material-icons">shop</i>Boutique</a></li>
                <li><a class="waves-effect" href="<?php echo isset($_SESSION['connected-user']) ? './view/historiqueUser.php' : './controller/connexionController.php' ?>">Historique</a></li>
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger right"><i class="material-icons">menu</i></a>



        </div>
    </div>
    </div>
    </div>
    <footer class="page-footer cyan ligthen-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">All rights reserved to THE VILLA</p>
                </div>
                <div class="col l4 offset-l2 s12 ">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Contact us 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">More Info</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright cyan darken-1">
            <div class="container">
                © 2024 Copyright THE VILLA
            </div>
        </div>
    </footer>
    <script type="text/javascript">
        var elem = document.querySelector('.sidenav');
        var instance = new M.Sidenav(elem);

        // with jquery

        $(document).ready(function() {
            $('.sidenav').sidenav();
        });

        // var submit = document.querySelector('#confirmation');

        /* set onclick on submit input */
        // submit.setAttribute("onclick", "return test()");

        //submit.addEventListener("click", test);
        var link = "";

        function test() {

            if (confirm('Voulez vous vous deconnecter ?')) {
                return true;

            } else {
                return false;
            }

        }


        // function popitup(url) {
        //     newwindow = window, open(url, 'name', 'height=200,width=650');
        //     if (window.focus) {
        //         newwindow.focus()
        //     }
        //     return false;
        // }
    </script>
</body>

</html>
<?php
