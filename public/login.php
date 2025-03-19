<?php
require '../includes/db.php';
session_start(); // Démarrer la session 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim ($_POST['username']);
    $password = trim ($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // 'admin ou user'
        header("Location: data.php"); // redirection apres connexion
        exit();
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect. ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Connexion</title>
</head>
<body>
<form method="post" autocomplete="off">
    <h2>Connectez-vous à votre espace</h2>
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="submit" value="Se connecter" class="submit"> 

    <a href="register.php" style="color=blue;">S'inscrire</a>
</form>
</body>
</html>

<?php
if (isset($error))
    echo "<p style='color:red;'> $error </p>";
?>
