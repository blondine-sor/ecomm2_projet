<?php

include("C:/wamp64/www/ecomm2_projet/models/inscriptionUser.php");

class InscriptionUserController
{
    private $model;

    public function __construct(InscriptionUser $modelinscription)
    {
        $this->model = $modelinscription;
    }

    public function AjouterUser(User $user)
    {
        return $this->model->AjouterUser($user);
    }
}

$server_name = "localhost";
$user = "root";
$pwd = "";

try {
    $conn = new PDO("mysql:host = $server_name; dbname=ecomm2_projet", $user, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $modelins = new InscriptionUser($conn);
    $controllerIns = new InscriptionUserController($modelins);
    include("C:/wamp64/www/ecomm2_projet/view/inscription.php");

    if (isset($_POST)) {
        extract($_POST);
        if (isset($submit)) {
            if ($username = "" || $nom = "" || $prenom = "" || $email = "" || $password = "" || $adresse = "" || $telephone = "") {
                echo 'alert("Veuillez remplir les champs")';
            } else {
                // var_dump(
                //     $_POST['username'],
                //     $_POST['nom'],
                //     $_POST['prenom'],
                //     $_POST['email'],
                //     $_POST['password'],
                //     $_POST['adresse'],
                //     $_POST['telephone']
                // );
                $username = $_POST['username'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $pwd = password_hash($password, PASSWORD_DEFAULT);
                $confirmp = $_POST['confirm-password'];
                if (password_verify($confirmp, $pwd)) {
                    $user = new User(
                        $username,
                        $nom,
                        $prenom,
                        $email,
                        $pwd,
                        $telephone,
                        " ",
                        $adresse,
                        0
                    );

                    echo '<script type="text/javascript">alert("Utilisateur Ajouter!") </script>';
                    var_dump($user);

                    $controllerIns->AjouterUser($user);
                } else {
                    echo ("Mot de Passe Incorrecte");
                }
            }
        }
    }
} catch (PDOException $ex) {
    echo "Erreur de Connexion" . $ex->getMessage();
}
