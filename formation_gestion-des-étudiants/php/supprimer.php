<?php
// Inclure la connexion à la base de données
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // S'assurer que l'ID est un entier

    // Préparer la requête de suppression
    $sql = "DELETE FROM test1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "L'enregistrement a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    // Redirection après la suppression
    header("Location: afficher.php");
    exit();
}
?>