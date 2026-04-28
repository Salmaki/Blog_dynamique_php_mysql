<?php
session_start();

require_once 'config/database.php';
require_once 'config/User.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($email) && !empty($password)) {

        $database = new Database();
        $db = $database->connect();

        if ($db) {

            $user = new User($db);
            $idUser = $user->login($email, $password);
            
            if ($idUser && is_array($idUser) && isset($idUser['id'])) {

                $_SESSION['user_id'] = $idUser['id'];
                $_SESSION['nom'] = $idUser['nom'] ?? 'Utilisateur';

                header("Location: index.php");
                exit;

            } else {
                $message = "Email ou mot de passe incorrect.";
            }

        } else {
            $message = "Connexion à la base de données échouée.";
        }

    } else {
        $message = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion</title>
<link rel="stylesheet" href="assets/css/auth.css">
</head>
<body>

<div class="container">
  <h2>Connexion</h2>

  <p><?= htmlspecialchars($message) ?></p>

  <form method="POST">
    <label>Email</label>
    <input type="email" name="email" required>

    <label>Mot de passe</label>
    <input type="password" name="password" required>

    <button type="submit">Se connecter</button>
  </form>

  <div class="link">
    <a href="register.php">Vous n'avez pas de compte ? S'inscrire</a>
  </div>
</div>

</body>
</html>