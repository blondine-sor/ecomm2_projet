<?php
include_once("../connection/connexiondb.php");


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['username'])) {
    $username = $_GET['username'];
}
var_dump($username);

$response = $conn->prepare("Update User SET profil='1' WHERE username='$username'");
$response->execute();

header("Location:../view/usersgestion.php");
