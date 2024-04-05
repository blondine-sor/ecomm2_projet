<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Inscriptions</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper">
            <a href="../index.php" class="brand-logo"> <img class="materialboxed" width="70" src="../public/images/logoPhp.png">
            </a>
            <a href="../index.php" class="brand-logo center">The Villa</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#"><i class="material-icons ">shopping_basket</i></a></li>
                <li><a href="#">Connexion</a></li>
                <li><a href="#">Inscriptions</a></li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <form class="col s12 " id="signup-form" method="post" action="../controller/inscriptionUserController.php">
            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nomUser" type="text" name="username" class="validate">
                    <label for="username">Nom d'utilisateur</label>
                    <span class="helper-text" data-error="Enter atleast 3 characters" data-success="right">HelperText</span>
                </div>

                <div class="input-field col s3">
                    <i class="material-icons prefix">account_circle</i>
                    <input placeholder="First Name" id="first_name" name="prenom" type="text" class="validate">
                    <label for="first_name">First Name</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
                <div class="input-field col s3">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="last_name" type="text" name="nom" class="validate">
                    <label for="last_name">Last Name</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">email</i>
                    <input id="courriel" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">phone</i>
                    <input id="icon_telephone" name="telephone" type="tel" class="validate">
                    <label for="icon_telephone">(---)___-____</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">lock</i>
                    <input id="pwd" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
                <div class="input-field col s3">
                    <i class="material-icons prefix">lock</i>
                    <input id="pwd" name="password" type="password" class="validate">
                    <label for="password">Confirm Password</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>

                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">domain</i>
                    <input id="address" name="adresse" type="text" class="validate">
                    <label for="adresse">Address</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
            </div>

            <button type="submit" id="button" name="submit" class="waves-effect waves-light btn "><i class="material-icons left">cloud</i>button</button>

        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#signup-form').validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3
                    },
                    nom: {
                        required: true,
                        minlength: 3
                    },
                    prenom: {
                        required: true,
                        minlength: 3
                    },
                    telephone: {
                        required: true,
                        minlength: 20,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    adresse: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    username: {
                        require: "Veuillez Remplir le champ",
                        text: true,
                        minlength: "Veuillez entrer au moins 3 caractères"
                    },
                    nom: {
                        require: "Veuillez Remplir le champ",
                        text: true,
                        minlength: "Veuillez entrer au moins 3 caractères"
                    },
                    prenom: {
                        require: "Veuillez Remplir le champ",
                        text: true,
                        minlength: "Veuillez entrer au moins 3 caractères"
                    },
                    telephone: {
                        require: "Veuillez Remplir le champ",
                        text: true,
                        minlength: "Veuillez entrer au moins 10 chiffres",
                        maxlength: "Vous ne pouvez pas entrer plus de 10 chiffres"
                    },
                    adresse: {
                        require: "Veuillez Remplir le champ",
                        text: true,
                        minlength: "Veuillez entrer au moins 3 caractères"
                    },

                },
                errorClass: 'invalid',
                validClass: 'valid',
                errorPlacement: function(error, element) {
                    $(element)
                        .closest("form")
                        .find("label[for='" + element.attr("id") + "']")
                        .attr('data-error', error.text());
                }
            });
        });
    </script>
</body>

</html>