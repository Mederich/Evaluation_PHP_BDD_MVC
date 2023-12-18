<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Page Article</h1>
    <form action="index.php" method="POST">
        <h2>Ajout d'un Article</h2>
        <input type="text" name="nom_article" placeholder="Nom Article">
        <input type="number" name="prix_article" placeholder="Prix Article">
        <input type="submit" name="ajoutarticle">
    </form>

    <p><?php echo $message ?></p>

    <h2>Liste des Articles</h2>
    <?php echo $messageArticle ?>
</body>
</html>