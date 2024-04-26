<?php
include_once("../connection/connexiondb.php");
if (!isset($_SESSION)) {
    session_start();
}

try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $response = $conn->prepare("SELECT * FROM produits WHERE idproduits= $id");
    $response->execute();
    while ($row = $response->fetch(PDO::FETCH_ASSOC)) {

        $_SESSION['item'] =
            [
                'id' => $id,
                'produit_name' => $row['produit_name'],
                'produit-image' => $row['produit-image'],
                'description' => $row['description'],
                'prix' => $row['prix']
            ];
    }
    header('Location:../controller/gestionProduitController.php');
} catch (PDOException $e) {
    echo "Erreur d'execution" . $e->getMessage();
}
