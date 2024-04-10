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
    public function Connexion($username, $pwd)
    {
        $sql = $this->bdd->query("SELECT * FROM User WHERE username='$username'");
        if ($res = $sql->fetch()) {
            $passwd = $res['password'];
            if (password_verify($pwd, $passwd)) {
                session_start();
                $token = random_bytes(30);
                $sql1 = $this->bdd->query("Update User SET token='$token'WHERE username='$username'");
                $sql1->execute();
                echo "Connexion établie";
                $iduser = $res['iduser'];
                $nom = $res['nom'];
                $prenom = $res['prenom'];
                $profil = $res['profil'];

                $_SESSION['connected-user'] =
                    [
                        'userid' => $iduser,
                        'token' => $token,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'profil' => $profil
                    ];
            } else {
                echo "Mot de passe incorrecte";
            }
        } else {
            echo "Login  incorrecte";
        }
    }
}