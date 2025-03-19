<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); //Redirige vers la connexion si non connecté
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenue, <?php echo $_SESSION['username'] ; ?> !</h1>
        <p>Votre rôle : <?php echo $_SESSION['role'] ; ?> </p>
        <p>Votre compte à été créer avec succès, vous pouvez à présent sauvegarder vos données en toutes tranquilités</p>
        <p> <a href="data.php">Naviguer...</a></p>

        <a href="logout.php" style="color=blue">Se déconnecter</a>
    </div>
</body>
</html>