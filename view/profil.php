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
    $email = $_SESSION['connected-user']['email'];

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
        <title>Profil</title>
    </head>

    <body>
        <div class="row">
            <div class="col s12 m7 l8">
                <div class="container">
                    <a href="../index.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">backspace</i></a>
                    <form action="" method="post">
                        <legend class="header">Profil </legend>
                        <fieldset>
                            <input type="number" name="iduser" id="id" hidden value="<?= $iduser ?>">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input value="<?= $prenom ?>" name="prenom" id="first_name" type="text" class="validate">
                                    <label class="active" for="first_name">First Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input value="<?= $nom ?>" name="nom" id="surname" type="text" class="validate">
                                    <label class="active" for="surname">Surname</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input value="<?= $telephone ?>" name="telephone" id="tel" type="text" class="validate">
                                    <label class="active" for="tel">Telephone</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input value="<?= $email ?>" id="email" name="email" type="email" class="validate">
                                    <label class="active" for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input value="<?= $adresse ?>" name="adresse" id="address" type="text" class="validate">
                                    <label class="active" for="addres">Adresse</label>
                                </div>
                            </div>
                            <span>Voulez vous modifier votre Mot de Passe</span> <a id="btnConf" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
                            <div class="row" id="pass" style="display: none;">

                                <div class="input-field col s6">
                                    <input name="password" id="pwd" type="text" class="validate">
                                    <label class="active" for="pwd">Pasword</label>
                                </div>
                                <div class="input-field col s6">
                                    <input value="" name="confirmPass" id="cpwd" type="text" class="validate">
                                    <label class="active" for="cpwd">Comfirm Password</label>
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </fieldset>
                    </form>
                <?php

            } ?>
                </div>
            </div>
        </div>
        <script>
            document.querySelector("#btnConf").addEventListener("click", function() {
                document.querySelector("#pass").style.display = "block";
            })
        </script>
    </body>

    </html>