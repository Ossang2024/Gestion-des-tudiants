<?php
//VÉRIFICATION SI LES INFORMATIONS SONT BIEN PRISEN CHAREGE DANS LE FORMULAIRE .
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $nom = $_POST['nom'];
//     $email = $_POST['email'];
//     $prenom = $_POST['prenom'];
//     $tel = $_POST['tel'];

//     echo "Nom : $nom <br>";
//     echo "Email : $email </br>";
//     echo "Prénom : $prenom <br>";
//     echo "Téléphone : $tel <br>";
// }
?> 

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if (empty($_POST['nom'])) {
        echo '<h1>Connexion échoué</h1>';
        echo "Le nom est requis.";
    } elseif(empty ($_POST['tel'])) {
        echo '<h1>Connexion échoué</h1>';
        echo "Le numéro de téléphone est requis.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    }else {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];

        echo "Nom : $nom <br>";
        echo "Email : $email <br>";
        echo "Prénom : $prenom <br>";
        echo "Téléphone : $tel <br>";    
    }
}
?>

