<?php
include_once("../connection/connexiondb.php");

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$response = $conn->prepare("SELECT * FROM produits WHERE idproduits= $id");
$response->execute();

if (empty($response->fetch(PDO::FETCH_ASSOC))) {
    die("Ce produit n'existe pas");
}

if (isset($_SESSION['panier'][$id])) {
    $_SESSION['panier'][$id]++;
} else {
    $_SESSION['panier'][$id] = 1;
}
header("location:../view/produits.php");
