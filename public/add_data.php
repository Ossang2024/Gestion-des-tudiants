<?php
require '../includes/db.php';
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO data (title, content, user_id) VALUES (:title, :content, :user_id)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['title' => $title, 'content' => $content, 'user_id' => $user_id]);
        header("Location: data.php");
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de l'ajout : " . $e->getMessage();
    }
}
?>



<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<div class="container">
    <h1>Ajouter une donnée</h1>
    <a href="data.php">Retour à la liste</a>

    <form method="post">
        <input type="text" name="title" placeholder="Titre" required>
        <textarea name="content" placeholder="Contenu" required></textarea>
        <button type="submit">Ajouter</button>
    </form>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>
