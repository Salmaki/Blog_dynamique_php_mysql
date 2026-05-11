<?php 
session_start();
require_once'config/database.php';
require_once'config/article.php';
if (isset($_SESSION['user_id'])) {
    $utilisateur= $_SESSION['nom'];
}
$database = new Database();
$db = $database->connect();
$article = new Article($db); 
$articles = $article->readAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>

    <header>
        <div class="logo"> Salma<span>Blog</span>.</div>
        <div>
        <?php if (!isset($utilisateur)) :?>
            <a href="login.php" class="connect">Se Connecter</a>
            <?php else:?>
            <a href="lougout.php" class="connect">Déconnecter</a>
            <span style="color:  #ff4da6;">@<?= $utilisateur ?></span>
            <?php endif; ?>
        </div>
    </header>
    <main>
        <h1>Bienvenue sur <br> Salma<span>Blog</span>.</h1>
        <div class="article_continer" id="article">
            <?php foreach($articles as $item) :  ?>
            <article>
                <a href="post.php?id=<?= $item['id'] ?>">
                <div class="img-card"><img src="<?= $item['image_path'] ?>" alt="image"></div>
                <h3><?= $item['titre'] ?></h3><br>
                <p> <?= $item['contenu'] ?></p>
                </a>
            </article>
              <?php endforeach; ?>
        </div>
    </main>
    <footer>
      <div class="copyright">
      <p>
       &copy; 2026 Salma Blog. Tous droits réservés.
      </p>
      </div>
    </footer>
</body>
</html>