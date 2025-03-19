<?php
// Inclure la connexion à la base de données
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérer les données de l'enregistrement
    $sql = "SELECT nom, prenom, email, tel message FROM test1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un contact</title>
</head>
<body>
    <h1>Modifier un enrégistrement</h1>
    <form action="modifier.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($data['nom']) ?>"><br>

        <label for="nom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($data['prenom']) ?>"><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>"><br>

        <label for="tel">Contact :</label>
        <input id="tel" name="tel" value="<?= htmlspecialchars($data['tel']) ?>"><br>

        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    // Préparer la requête de mise à jour
    $sql = "UPDATE contacts SET nom = ?, email = ?, message = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nom, $email, $message, $id);

    if ($stmt->execute()) {
        echo "L'enregistrement a été mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour : " . $stmt->error;
    }

    // Redirection après la modification
    header("Location: afficher.php");
    exit();
}

 $conn->close();
?>

