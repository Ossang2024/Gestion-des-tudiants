<?php
require '../includes/db.php';
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Vérifier si un ID est passé
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: data.php");
    exit();
}

$id = $_GET['id'];

// Supprimer la donnée
$sql = "DELETE FROM data WHERE id = :id";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute(['id' => $id]);
} catch (PDOException $e) {
    die("Erreur lors de la suppression : " . $e->getMessage());
}

header("Location: data.php");
exit();
?>