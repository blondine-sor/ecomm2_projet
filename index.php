<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, options);
        });
    </script>
    <title>The Villa</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo"> <img class="materialboxed" width="70" src="./public/images/logoPhp.png">
            </a>
            <a href="#" class="brand-logo center">The Villa</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#"><i class="material-icons ">shopping_basket</i></a></li>
                <li><a href="#">Connexion</a></li>
                <li><a href="./controller/inscriptionUserController.php">Inscriptions</a></li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col s12 m7">
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
                    <a href="#">Don't Hesitate And Reserve</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">All rights reserved to THE VILLA</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Contact us 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">More Info</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2024 Copyright THE VILLA
            </div>
        </div>
    </footer>
</body>

</html>