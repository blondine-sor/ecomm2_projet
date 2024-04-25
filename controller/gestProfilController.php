<?php

include("C:/wamp64/www/ecomm2_projet/models/InscriptionUser.php");
class GestionProfilController
{

    private $model;

    public function __construct(InscriptionUser $model)
    {
        $this->model = $model;
    }

    public function UpdateName($nom, $id)
    {
        $this->model->UpdateName($nom, $id);
    }
    public function UpdatePrenom($prenom, $id)
    {
        $this->model->UpdatePrenom($prenom, $id);
    }
    public function UpdateTel($tel, $id)
    {
        $this->model->UpdateTel($tel, $id);
    }
    public function UpdateEmail($email, $id)
    {
        $this->model->UpdateEmail($email, $id);
    }
    public function UpdateAdress($adresse, $id)
    {
        $this->model->UpdateAdress($adresse, $id);
    }
    public function UpdatePass($password, $id)
    {
        $this->model->UpdatePass($password, $id);
    }
}



include("C:/wamp64/www/ecomm2_projet/view/profil.php");
try {

    include("C:/wamp64/www/ecomm2_projet/connection/connexiondb.php");

    $model = new InscriptionUser($conn);
    $gestProfil = new GestionProfilController($model);
    if (isset($_POST)) {
        extract($_POST);
        if (isset($modifier)) {


            if (isset($_SESSION['connected-user'])) {
                $iduser = $_SESSION['connected-user']['userid'];
                $nom1 =  $_SESSION['connected-user']['nom'];
                $prenom1 =  $_SESSION['connected-user']['prenom'];
                $profil =  $_SESSION['connected-user']['profil'];
                $telephone1 = $_SESSION['connected-user']['telephone'];
                $adresse1 = $_SESSION['connected-user']['adresse'];
                $email1 = $_SESSION['connected-user']['email'];
                $password1 = $_SESSION['connected-user']['password'];
            }
            if ($nom !== $nom1 && strlen($nom) > 0) {
                $gestProfil->UpdateName($nom, $iduser);
            } else {
                echo "No change";
            }
            if ($prenom !== $prenom1 && strlen($prenom) > 0) {
                $gestProfil->UpdatePrenom($prenom, $iduser);
            } else {
                echo "No Change";
            }
            if ($telephone !== $telephone1 && strlen($telephone) > 0) {
                $gestProfil->UpdateTel($telephone, $iduser);
            } else {
                echo "No Change";
            }
            if ($email !== $email1 && strlen($email) > 0) {
                $gestProfil->UpdateEmail($email, $iduser);
            } else {
                echo "No Change";
            }
            if ($adresse !== $adresse1 && strlen($adresse) > 0) {
                $gestProfil->UpdateAdress($adresse, $iduser);
            } else {
                echo "No Change";
            }
            if (strlen($password) > 0) {
                $pwd = password_hash($password, PASSWORD_DEFAULT);
            }
            if (password_verify($pwd, $confirmPass)) {
                if (!password_verify($pwd, $password1)) {
                    $gestProfil->UpdatePass($pwd, $iduser);
                } else {
                    echo "No Change";
                }
            } else {
                echo "Password don't match";
            }
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion" . $e->getMessage();
}
