<?php
session_start();
$servername = "localhost";
$dbname = "projet_php";
$username = "root";
$password = "";


$connexion = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
}
?>
