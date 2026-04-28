<?php
require_once 'config/database.php';
require_once 'config/User.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($nom) && !empty($email) && !empty($password)) {
        $database = new Database();
        $db = $database->connect();
        if ($db) {
        $user = new User($db);
    if ($user->register($nom, $email, $password)) {
        $message = "<div class='msg-box success'>Succès du protocole : compte créé avec succès.</div>";
       } else {
        $message = "<div class='msg-box error'>Erreur système : l'email existe déjà.</div>";
       }
   } else {
    $message = "<div class='msg-box error'>Erreur critique : échec de la connexion à la base de données.</div>";
   }
   } else {
    $message = "<div class='msg-box error'>Erreur de validation : tous les champs sont obligatoires.</div>";
   }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<link rel="stylesheet" href="assets/css/auth.css">
</head>
<body>

<div class="container">
  <h2>Inscription</h2>
   <?= isset($message) ? $message : "" ?>
  <form method="POST">
 
    <label>Nom d'utilisateur</label>
    <input type="text" name="nom" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Mot de passe</label>
    <input type="password" name="password" required>

    <button type="submit">S'inscrire</button>
    <div style="text-align: center; margin-top: 24px; font-size: 13px; color: var(--text-secondary);">
    Déjà inscrit ? <a href="login.php">Accéder au système</a>
   </div>
  </form>
</div>

</body>
</html>