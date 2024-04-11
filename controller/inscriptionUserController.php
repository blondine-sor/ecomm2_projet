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
    public function VerifyUserName($username)
    {
        return $this->model->VerifyUserName($username);
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

            $username = $_POST['username'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $pwd = password_hash($password, PASSWORD_DEFAULT);
            $confirmp = $_POST['confirm-password'];

            $verifyUserName = $controllerIns->VerifyUserName($username);

            if (!$verifyUserName) {

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
                if (password_verify($confirmp, $pwd)) {
                    echo '<script type="text/javascript">alert("Utilisateur Ajouter!") </script>';
                    var_dump($user);

                    $controllerIns->AjouterUser($user);
                } else {
                    echo ("Mot de Passe Incorrecte");
                }
            } else {
                echo '<script type="text/javascript">alert("Utilisateur Existant") </script>';
            }
        }
    }
} catch (PDOException $ex) {
    echo "Erreur de Connexion" . $ex->getMessage();
}
