<?php
include("C:/wamp64/www/ecomm2_projet/models/inscriptionUser.php");
class ConnexionController
{
    private $model;

    public function __construct(InscriptionUser $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }
    public function setModel($newModel)
    {
        $this->model = $newModel;
    }
    public function Connexion($username, $pwd)
    {
        return $this->model->Connexion($username, $pwd);
    }
}

$server_name = "localhost";
$user = "root";
$pwd = "";

try {
    $conn = new PDO("mysql:host = $server_name; dbname=ecomm2_projet", $user, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $modelins = new InscriptionUser($conn);
    $controllerCon = new ConnexionController($modelins);

    include("C:/wamp64/www/ecomm2_projet/view/connexion.php");

    if (isset($_POST)) {
        extract($_POST);
        if (isset($connect)) {
            $verif = $controllerCon->Connexion($username, $password);
            header("Location:../index.php");
        }
    }
} catch (PDOException $ex) {
    echo "Erreur de Connexion" . $ex->getMessage();
}
