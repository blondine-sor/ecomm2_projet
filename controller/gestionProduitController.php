<?php
include("C:/wamp64/www/ecomm2_projet/models/produitModel.php");

class GestionProduitController
{
    private $model;

    public function __construct(ProduitModel $model)
    {
        $this->model = $model;
    }

    public function UpdateProduitName($nom_produit, $id)
    {
        return $this->model->UpdateProduitName($nom_produit, $id);
    }
    public function UpdateProduitImage($nom_image, $id)
    {
        return $this->model->UpdateProduitImage($nom_image, $id);
    }
    public function UpdateProduitDesc($desc, $id)
    {
        return $this->model->UpdateProduitDesc($desc, $id);
    }
    public function UpdateProduitPrix($prix, $id)
    {
        return $this->model->UpdateProduitPrix($prix, $id);
    }
}

include_once("C:/wamp64/www/ecomm2_projet/connection/connexiondb.php");

try {
    $gestprodModel = new ProduitModel($conn);
    $gestProdContr = new GestionProduitController($gestprodModel);
    include("C:/wamp64/www/ecomm2_projet/view/editerProduit.php");

    if (isset($_POST)) {
        extract($_POST);
        if (isset($editer)) {
            if (isset($_SESSION['item'])) {
                $id = $_SESSION['item']['id'];
                $name = $_SESSION['item']['produit_name'];
                $image = $_SESSION['item']['produit-image'];
                $desc = $_SESSION['item']['description'];
                $prix1 = $_SESSION['item']['prix'];
            }

            if ($produit_name !== $name && strlen($produit_name) > 0) {
                $gestProdContr->UpdateProduitName($produit_name, $id);
            } else {
                echo "No Change";
            }
            if ($produit_image !== $image && strlen($produit_image) > 0) {
                $gestProdContr->UpdateProduitImage($produit_image, $id);
            } else {
                echo "No Change";
            }
            if ($description !== $desc && strlen($description) > 0) {
                $gestProdContr->UpdateProduitDesc($description, $id);
            } else {
                echo "No Change";
            }
            if ($prix !== $prix1 || $prix == 0) {
                $gestProdContr->UpdateProduitPrix($prix, $id);
            } else {
                echo "No Change";
            }
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion" . $e->getMessage();
}
