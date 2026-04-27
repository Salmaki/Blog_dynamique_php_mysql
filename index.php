<?php 
require_once'config/database.php';
require_once'config/article.php';
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
       <nav>
        <a href="#">Acceuil</a>
        <a href="article.html">Article</a>
        <a href="contact.html">Contact</a>
       </nav>
       <button>Se Connecter</button>
    </header>
    <main>
        <h1>Bienvenue sur <br> Salma<span>Blog</span>.</h1>
        <div class="article_continer" id="article">
            <?php foreach($articles as $item) :  ?>
            <article>
                <a href="article.php?<?=  $item['id']?>">
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