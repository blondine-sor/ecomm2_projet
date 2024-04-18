<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <title>Gestion Utilisateur</title>
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
    <section class="col s12 m7 l7">
        <table class="stripped" border="2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Utilisateur</th>
                    <th>Changer</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateur as $user) : ?>
                    <tr>
                        <td></td>
                        <td><?php echo $user->getUsername() ?></td>
                        <td><a href="../controller/gestionUser.php?username=<?= $user->getUsername(); ?>" class="btn-floating btn-large waves-effect waves-light cyan"><i class="material-icons">add</i></a></td>
                        <td><a href="../controller/gestionUser.php?username=<?= $user->getUsername() ?>" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">remove_circle</i></a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>

</body>

</html>