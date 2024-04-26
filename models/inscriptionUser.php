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
    public function VerifyUserName($username)
    {

        $reponse = $this->bdd->prepare("SELECT username FROM User");
        $reponse->execute();
        $utilisateur = array();
        while ($row = $reponse->fetch(PDO::FETCH_ASSOC)) {
            if ($username == $row['username']) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function GestionUtilisateurs()
    {
        try {
            $reponse = $this->bdd->prepare("SELECT * FROM User WHERE profil='0'");
            $reponse->execute();
            $utilisateur = array();
            while ($row = $reponse->fetch(PDO::FETCH_ASSOC)) {
                $utilisateur[] = new User($row['username'], $row['nom'], $row['prenom'], $row['email'], $row['password'], $row['telephone'], $row['token'], $row['adresse'], $row['profil']);
            }
            return $utilisateur;
        } catch (PDOException $e) {
            echo "Erreur lors de l'exécution de la requête :" . $e->getMessage();
            return array();
        }
    }
    public function Connexion($username, $pwd)
    {
        $sql = $this->bdd->query("SELECT * FROM User WHERE username='$username'");
        if ($res = $sql->fetch()) {
            $passwd = $res['password'];
            if (password_verify($pwd, $passwd)) {
                session_start();
                $token = random_bytes(30);
                $sql1 = $this->bdd->query("UPDATE User SET token='$token' WHERE username='$username'");
                $sql1->execute();
                echo "Connexion établie";
                $iduser = $res['iduser'];
                $nom = $res['nom'];
                $prenom = $res['prenom'];
                $profil = $res['profil'];
                $adresse = $res['adresse'];
                $tel = $res['telephone'];
                $email = $res['email'];
                $password = $res['password'];

                var_dump($iduser, $nom, $prenom, $profil, $adresse, $tel, $email);

                $_SESSION['connected-user'] =
                    [
                        'userid' => $iduser,
                        'token' => $token,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'profil' => $profil,
                        'adresse' => $adresse,
                        'email' => $email,
                        'telephone' => $tel,
                        'password' => $password,

                    ];
            } else {
                echo "Mot de passe incorrecte";
            }
        } else {
            echo "Login  incorrecte";
        }
    }

    public function UpdateName($nom, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE User SET nom='$nom' WHERE iduser='$id'");
            $sql->execute();
        } catch (PDOException $e) {
            echo "Erreur de la requete :" . $e->getMessage();
        }
    }
    public function UpdatePrenom($prenom, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE User SET prenom='$prenom' WHERE iduser='$id'");
            $sql->execute();
        } catch (PDOException $e) {
            echo "Erreur de la requete :" . $e->getMessage();
        }
    }
    public function UpdateTel($tel, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE User SET telephone='$tel' WHERE iduser='$id'");
            $sql->execute();
        } catch (PDOException $e) {
            echo "Erreur de la requete :" . $e->getMessage();
        }
    }
    public function UpdateEmail($email, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE User SET email='$email' WHERE iduser='$id'");
            $sql->execute();
        } catch (PDOException $e) {
            echo "Erreur de la requete :" . $e->getMessage();
        }
    }
    public function UpdateAdress($adresse, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE User SET adresse='$adresse' WHERE iduser='$id'");
            $sql->execute();
        } catch (PDOException $e) {
            echo "Erreur de la requete :" . $e->getMessage();
        }
    }
    public function UpdatePass($password, $id)
    {
        try {
            $sql = $this->bdd->prepare("UPDATE User SET password='$password' WHERE iduser='$id'");
            $sql->execute();
        } catch (PDOException $e) {
            echo "Erreur de la requete :" . $e->getMessage();
        }
    }
}
