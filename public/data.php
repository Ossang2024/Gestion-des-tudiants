

<?php
require '../includes/db.php';
session_start();

//vérifier si l'utilisateur est connété
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

//Récuper les données 
$sql = "SELECT d.id, d.title, d.content, u.username, d.created_at
        FROM data d
        JOIN users u ON d.user_id = u.id
        ORDER BY d.created_at DESC";
$stmt = $pdo->query($sql);
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
// require '../includes/db.php';
// session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Gestion de la recherche
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$sql = "SELECT d.id, d.title, d.content, u.username, d.created_at 
        FROM data d 
        JOIN users u ON d.user_id = u.id";

if (!empty($search)) {
    $sql .= " WHERE d.title LIKE :search OR d.content LIKE :search";
}

$sql .= " ORDER BY d.created_at DESC";
$stmt = $pdo->prepare($sql);

if (!empty($search)) {
    $stmt->execute(['search' => "%$search%"]);
} else {
    $stmt->execute();
}

$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Mes données </title>
</head>
<body>

    <div class="container">
        <a href="export_pdf.php" target="blank">📁 Exportercen PDF</a>

        <form method="GET">
            <input type="text" name="search" placeholder="Rechercher..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" autocomplete="off">
            <button type="submit" >Rechercher</button>
        </form>

        <div>
            <h1>Liste des données</h1>
            <a href="add_data.php">Ajouter une nouvelle donnée</a> | <a href="logout.php">Déconnexion</a> |  <a href="index.php">Acceuil</a>
            
            <table border="1">
                <tr>
                    <th>ID </th>
                    <th>Titre</th>
                    <th>Contenue </th>
                    <th>Auteur 🧑🏻‍🦱 </th>
                    <th>Date 📆</th>
                    <th>Actions</th>
                </tr>

                <?php foreach ($datas as $data) :?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= htmlspecialchars($data['title']) ?></td>
                        <td><?= htmlspecialchars($data['content']) ?></td>
                        <td><?= htmlspecialchars($data['username']) ?></td>
                        <td><?= $data['created_at'] ?></td>
                        <td style="text-align=center;">
                            <a href="edit_data.php?id=<?= $data['id'] ?>"> Modifier🖋️ </a> |
                            <a href="delete_data.php?id=<? $data['id'] ?>" onclick="return confirm('voulez-vous vraimment supprimer cette donée ?');" class="delete">Supprimer🚮</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>   
</body>
</html>