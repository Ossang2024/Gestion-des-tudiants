<?php
require '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo-> prepare($sql);

    try {
        $stmt->execute(['username' => $username, 'password' => $password]);
        echo "<p>utilisateur inscrit avec succès !</p>";
        // header("Location: dashboard.php"); // redirection apres connexion
    } catch (PDOException $e) {
        echo "<span style='color=red;'>Erreur : Veuillez saisir un nom d'utilisateur différent <span>" ; //. $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <form method="post" autocomplete="off">
        <h2>Créez votre compte</h2>
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="submit" value="S'inscrire" class="submit"> 
        <a href="login.php" style="color=blue;">Se connecter</a>
    </div>
</form>

</body>
</html>
