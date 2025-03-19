<?php
session_start();
session_destroy(); //détruit rtoutes les données de session 
header("Location: login.php"); // Rédirige vers la connexion
exit();
?>