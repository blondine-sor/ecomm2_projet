<?php

class Admin extends User
{



    public function __construct($u, $n, $p, $e, $a, $pass, $tel, $token)
    {
        parent::__construct($u, $n, $p, $e, $a, $pass, $tel, $token);
    }
    public function getUsername()
    {
        parent::getUsername();
    }

    public function getNom()
    {
        parent::getNom();
    }
    public function getPrenom()
    {
        parent::getPrenom();
    }
    public function getEmail()
    {
        parent::getEmail();
    }
    public function getAdresse()
    {
        parent::getAdresse();
    }
    public function getPassword()
    {
        parent::getPassword();
    }
    public function getTel()
    {
        parent::getTel();
    }
    public function getToken()
    {
        parent::getToken();
    }
}
