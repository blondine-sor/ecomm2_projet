<?php


class User
{
    protected string $username;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $adresse;
    protected string $password;
    protected string $telephone;
    protected string $token;

    public function __construct($u, $n, $p, $e, $a, $pass, $tel, $token)
    {
        $this->username = $u;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $e;
        $this->adresse = $a;
        $this->password = $pass;
        $this->telephone = $tel;
        $this->token = $token;
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
}
