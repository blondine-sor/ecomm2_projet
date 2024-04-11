<?php
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

include_once("C:/wamp64/www/ecomm2_projet/connection/connexion.php");
try {

    $pmodel = new ProduitModel($conn);
    $ajouProduitCon = new AjouProduitController($pmodel);

    include("C:/wamp64/www/ecomm2_projet/view/ajoutproduit.php");
    if (isset($_POST)) {
        extract($_POST);
        if (isset($ajouter)) {
            $produit = new Produit(
                $produit_name,
                $produit_image,
                $description,
                $prix
            );
            $ajouProduitCon->AjouterProduit($produit);
            echo '<script type="text/javascript">alert("Produit Ajouter!") </script>';
            var_dump($produit);
        }
    }
} catch (PDOException $ex) {
    echo "Erreur de Connexion" . $ex->getMessage();
}
