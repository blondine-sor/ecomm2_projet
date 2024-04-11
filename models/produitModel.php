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
}
