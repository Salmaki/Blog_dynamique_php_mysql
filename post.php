<?php 
require_once'config/database.php';
require_once'config/article.php';
if (!isset($_GET['id'])||empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$postId= $_GET['id'];
$database = new Database();
$db = $database->connect();
$article = new Article($db); 
$post = $article->readById($postId);
if (!$post) {
    header("Location: index.php");
    exit;
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/post.css">
</head>
<body>
<main>
    <div class="single-post">
        <img src="<?php echo $post['image_path']; ?>" alt="">

        <h1><?php echo $post['titre']; ?></h1>

        <p class="meta">
            Posté le <?php echo date('d M Y', strtotime($post['created_at'])); ?>
        </p>

        <div class="content">
            <?php echo nl2br($post['contenu']); ?>
        </div>

        <a href="index.php" class="back-btn">← Retour</a>
    </div>
</main>
</body>
</html>

