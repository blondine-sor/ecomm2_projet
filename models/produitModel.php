<?php

include("C:/wamp64/www/ecomm2_projet/models/class/produit.php");
class ProduitModel
{
    private $bdd;


    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function setBdd($newBdd)
    {
        $this->bdd = $newBdd;
    }

    public function AjouterProduit(Produit $produit)
    {
        $sql = $this->bdd->prepare("INSERT INTO Produits VALUES(NULL,?,?,?,?)");
        $sql->execute(array(
            $produit->getName(),
            $produit->getImage(),
            $produit->getDesc(),
            $produit->getPrix(),
        ));
    }
    public function UpdateProduitName($nom_produit, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE Produits SET produit_name='$nom_produit' WHERE idproduits='$id'");
            $sql->execute();
        } catch (PDOException $ex) {
            echo "Erreur de la requete :" . $ex->getMessage();
        }
    }
    public function UpdateProduitImage($nom_image, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE Produits SET produit-image ='$nom_image' WHERE idproduits='$id'");
            $sql->execute();
        } catch (PDOException $ex) {
            echo "Erreur de la requete :" . $ex->getMessage();
        }
    }
    public function UpdateProduitDesc($desc, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE Produits SET description='$desc' WHERE idproduits='$id'");
            $sql->execute();
        } catch (PDOException $ex) {
            echo "Erreur de la requete :" . $ex->getMessage();
        }
    }
    public function UpdateProduitPrix($prix, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE Produits SET prix='$prix' WHERE idproduits='$id'");
            $sql->execute();
        } catch (PDOException $ex) {
            echo "Erreur de la requete :" . $ex->getMessage();
        }
    }
}
