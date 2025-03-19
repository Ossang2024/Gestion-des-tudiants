<?php
$host = "localhost" ;
$dbname = "gestion_données";
$username = "root"; //par défaut sur xampp
$password = "";

try {
    $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de donnée : ". $e->getMessage()) ;
}
?>