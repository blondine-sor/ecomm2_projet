<?php
$server_name = "localhost";
$user = "root";
$pwd = "";


$conn = new PDO("mysql:host = $server_name; dbname=ecomm2_projet", $user, $pwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
