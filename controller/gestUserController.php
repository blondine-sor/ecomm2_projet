<?php
include("C:/wamp64/www/ecomm2_projet/models/inscriptionUser.php");
class GestionUsersController
{

    private $model;


    public function __construct(InscriptionUser $modelUser)
    {
        $this->model = $modelUser;
    }

    public function GestionUtilisateurs()
    {
        return $this->model->GestionUtilisateurs();
    }
}

include_once("C:/wamp64/www/ecomm2_projet/connection/connexiondb.php");
try {
    $modelgest = new InscriptionUser($conn);
    $gestController = new GestionUsersController($modelgest);

    $utilisateur = $gestController->GestionUtilisateurs();

    include("C:/wamp64/www/ecomm2_projet/view/usersgestion.php");
} catch (PDOException $ex) {
    echo "Erreur de Connexion" . $ex->getMessage();
}
