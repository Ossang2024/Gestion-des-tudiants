<?php
require '../includes/db.php';
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Vérifier si un ID est passé en paramètre
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: data.php");
    exit();
}

$id = $_GET['id'];

// Récupérer les données existantes
$sql = "SELECT * FROM data WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    header("Location: data.php");
    exit();
}

// Mettre à jour les données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $sql = "UPDATE data SET title = :title, content = :content WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['title' => $title, 'content' => $content, 'id' => $id]);
        header("Location: data.php");
        exit();
    } catch (PDOException $e) {
        $error = "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}
?>



<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<div class="container">
    <h1>Modifier une donnée</h1>
    <a href="data.php">Retour à la liste</a>

    <form method="post">
        <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" required>
        <textarea name="content" required><?= htmlspecialchars($data['content']) ?></textarea>
        <button type="submit">Modifier</button>
    </form>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>
