<?php


class User
{
    public string $username;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $adresse;
    private string $password;
    private string $telephone;
    private string $token;
    private int $profil;


    public function __construct($u, $n, $p, $e, $pwd, $tel, $token, $a, $profil)
    {
        $this->username = $u;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $e;
        $this->adresse = $a;
        $this->password = $pwd;
        $this->telephone = $tel;
        $this->token = $token;
        $this->profil = $profil;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getTel()
    {
        return $this->telephone;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function getProfil()
    {
        return $this->profil;
    }

    public function setUsername($newUsername)
    {
        $this->username = $newUsername;
    }
    public function setNom($newNom)
    {
        $this->nom = $newNom;
    }
    public function setPrenom($newPrenom)
    {
        $this->prenom = $newPrenom;
    }
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
    public function setAdresse($newAdresse)
    {
        $this->adresse = $newAdresse;
    }
    public function setPassword($newPassword)
    {
        $this->password = $newPassword;
    }
    public function setTel($newTel)
    {
        $this->telephone = $newTel;
    }
    public function setToken($newToken)
    {
        $this->token = $newToken;
    }
    public function setProfil($newProfil)
    {
        $this->profil = $newProfil;
    }
    public function AfficherUser()
    {
        echo $this->username;
        echo $this->nom;
        echo $this->prenom;
        echo $this->email;
        echo $this->adresse;
        echo $this->password;
        echo $this->telephone;
        echo $this->token;
        echo $this->profil;
    }
}
