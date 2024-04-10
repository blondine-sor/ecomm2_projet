<?php
include_once("../connection/connexion.php");
include("C:/wamp64/www/ecomm2_projet/models/produitModel.php");

class AjouProduitController
{
    private $model;

    public function __construct(ProduitModel $pmodel)
    {
        $this->model = $pmodel;
    }

    public function AjouterProduit(Produit $produit)
    {

        return $this->model->AjouterProduit($produit);
    }
}


try {

    $pmodel = new ProduitModel($conn);
    $ajouProduitCon = new AjouProduitController($pmodel);
    include("C:/wamp64/www/ecomm2_projet/view/ajoutproduit.php");
    if (isset($_POST)) {
        extract($_POST);
        if ($ajouter) {
            var_dump($_POST);
        }
    }
} catch (PDOException $ex) {
    echo "Erreur de Connexion" . $ex->getMessage();
}
