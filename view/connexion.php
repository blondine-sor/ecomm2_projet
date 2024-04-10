<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="../public/css/connect.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Connexion</title>
</head>

<body>
    <h3 class="cyan darken-2 center-align"><span class="card-title ">Connexion</span></h3>
    <div class="row valign-wrapper ">
        <div class="container cyan lighten-5 col s12 ">
            <form action="../controller/connexionController.php" method="post">
                <div class="row">
                    <div class="input-field col s3">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nomUser" type="text" name="username" required class="validate">
                        <label for="username">Username</label>
                        <span class="helper-text" data-error="Enter atleast 3 characters" data-success="right">HelperText</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s3">
                        <i class="material-icons prefix">lock</i>
                        <input id="pwd" name="password" type="password" required class="validate">
                        <label for="password">Password</label>
                        <span class="helper-text" data-error="Enter atleast 5 characters" data-success="right">Helper text</span>
                    </div>
                </div>

                <div class="right">
                    <button class="btn waves-effect waves-light" name="connect" type="submit" name="action">Connexion
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </form>
        </div>

</body>

</html>