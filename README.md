🎓 Gestion des Étudiants
📌 Description
Gestion des Étudiants est une application web permettant d'enregistrer, d'afficher, de modifier et de supprimer les informations des étudiants, y compris leurs notes et moyennes. Elle permet également de générer des bulletins et d'afficher des statistiques globales.

🚀 Fonctionnalités
✅ Ajouter, modifier et supprimer un étudiant
✅ Interface utilisateur intuitive avec filtres et recherche
✅ Gestion sécurisée avec authentification

🖥️ Technologies Utilisées
🔹 Front-end : HTML, CSS, JavaScript 
🔹 Back-end : PHP (avec MySQL)
🔹 Base de données : MySQL
🔹 Hébergement : XAMPP,

🛠️ Installation et Configuration
📌 Prérequis
Un serveur local (XAMPP, WAMP, ou MAMP)
PHP installé (≥ 7.4 recommandé)
MySQL installé
📌 Étapes d’installation
1️⃣ Cloner le projet ou télécharger les fichiers

Via GitHub :
bash
Copier
Modifier
git clone https://github.com/TonNomUtilisateur/gestion-etudiants.git
cd gestion-etudiants
Ou télécharge directement les fichiers et extrais-les dans le dossier htdocs (XAMPP) ou www (WAMP).
2️⃣ Configurer la base de données

Ouvrir phpMyAdmin
Créer une base de données nommée gestion_etudiants
Importer le fichier database.sql fourni dans le projet
3️⃣ Configurer la connexion à la base de données

Modifier le fichier config.php avec les bonnes informations :
php
Copier
Modifier
$host = "localhost";
$user = "root"; // Ton utilisateur MySQL
$password = ""; // Ton mot de passe MySQL
$dbname = "gestion_etudiants";
4️⃣ Démarrer le serveur et accéder à l'application

Démarrer Apache et MySQL depuis XAMPP/WAMP
Ouvrir un navigateur et accéder à :
arduino
Copier
Modifier
http://localhost/gestion-etudiants
📷 Aperçu de l’Application

🤝 Contribution
Tu souhaites améliorer le projet ? Suis ces étapes :
1️⃣ Forker le dépôt
2️⃣ Créer une nouvelle branche (git checkout -b feature-nouvelle-fonctionnalite)
3️⃣ Ajouter tes modifications (git commit -m "Ajout d'une nouvelle fonctionnalité")
4️⃣ Pousser sur GitHub (git push origin feature-nouvelle-fonctionnalite)
5️⃣ Ouvrir une Pull Request

📜 Licence
📌 Ce projet est sous licence MIT – Utilisation libre et modification autorisée.

🎉 Merci d’utiliser Gestion des Étudiants ! N’hésite pas à proposer des améliorations. 😊
