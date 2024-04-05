<?php
include("C:/wamp64/www/ecomm2_projet/models/class/user.php");

class InscriptionUser
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

    public function AjouterUser(User $user)
    {
        $sql = $this->bdd->prepare("INSERT INTO User VALUES(NULL,?,?,?,?,?,?,?,?,?)");
        $sql->execute(array(
            $user->getUsername(),
            $user->getNom(),
            $user->getPrenom(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getTel(),
            $user->getToken(),
            $user->getAdresse(),
            $user->getProfil(),
        ));
    }
}
