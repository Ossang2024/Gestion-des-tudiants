<?php
$servername = "localhost";
$username = "root";  // Par défaut, l'utilisateur est "root" sans mot de passe
$password = "";      // Par défaut, aucun mot de passe n'est défini
$dbname = "formulaire"; // Le nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
} 
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];

    // Préparer la requête d'insertion
    $sql = "INSERT INTO test1 (nom, email, prenom, tel) VALUES ('$nom', '$email', '$prenom', '$tel')";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        echo "<div style='color: green; font-weight: bold;'>Les données ont été enregistrées avec succès.</div>";
    } else {
        echo "<div style='color: red; font-weight: bold;'>Erreur : " . $stmt->error . "</div>";
    }

    // Fermer la connexion
}
?> 

<br>







<!-- code permettant d'enrégistrer les informations dans un tableau -->
<?php
// Récupérer les données
$sql = "SELECT id, nom, email, prenom, tel FROM test1";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des contacts</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Faculty+Glyphic&family=Gothic+A1&family=League+Spartan:wght@100..900&display=swap');

        *{
            font-family: ;
            margin: 20px;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Faculty Glyphic", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        body {
            display : flex ;
            align-items : center ;
            justify-content : center ;
            flex-direction : column ; 
        }

        .retour {
            /* position: relative ;
            bottom : 50px ;
            right : 50px ; */
            font-size : 20px ;
            color: black ;
            background-color : rgb(140,154,165) ;
            padding : 10px 20px ;
            border-radius : 10px ;
            margin-left: 90%;
            margin-bottom: 30px;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 100px ;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f9;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Liste des contacts enregistrés</h1>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['nom']) ?></td>
                        <td><?= htmlspecialchars($row['prenom']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['tel']) ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $row['id'] ?>">Modifier</a>
                        </td>
                        <td>
                            <a href="supprimer.php?id=<?= $row['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun contact enregistré.</p>
    <?php endif; ?>

    <a href="../html/index.html" style="color: blue; text-decoration: none;" class="retour">Retour </a>
</body>
</html>
