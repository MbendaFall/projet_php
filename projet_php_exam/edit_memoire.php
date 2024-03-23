<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_web.css">
    <title>Modifier Mémoire</title>
</head>
<body>
    <div class="contenu">
    <h1>Modifier Mémoire</h1>
    <form action="traitement_edit_memoire.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label for="titre">Titre:</label><br>
        <input type="text" id="titre" name="titre"><br><br>
        <label for="contenu">Contenu:</label><br>
        <textarea id="contenu" name="contenu"></textarea><br><br>
        <input type="submit" value="Modifier">
    </form>
    </div>
</body>
</html>
