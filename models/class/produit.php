<?php

class Produit
{

    private string $produit_name;
    private string $produit_image;
    private string $description;
    private float $prix;

    public function __construct($name, $img, $desc, $prix)
    {
        $this->produit_name = $name;
        $this->produit_image = $img;
        $this->description = $desc;
        $this->prix = $prix;
    }

    public function getName()
    {
        return $this->produit_name;
    }

    public function getImage()
    {
        return $this->produit_image;
    }

    public function getDesc()
    {
        return $this->description;
    }
    public function getPrix()
    {
        return $this->prix;
    }

    public function setName($newName)
    {
        $this->produit_name = $newName;
    }
    public function setImg($newImg)
    {
        $this->produit_image = $newImg;
    }
    public function setDesc($newDesc)
    {
        $this->description = $newDesc;
    }
    public function setPrix($newPrix)
    {
        $this->prix = $newPrix;
    }
}
