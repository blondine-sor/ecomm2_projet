<?php
session_start();

if (isset($_SESSION['connected-user'])) {
    unset($_SESSION['connected-user']);
    header("Location:../index.php");
} else {
    echo "Aucun utilisateur connecter";
}
