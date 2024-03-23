<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_web.css">
    <title>Modifier Utilisateur</title>
</head>
<body>
    <div class="contenu">
    <h1>Modifier Utilisateur</h1>
    <form action="traitement_modify_user.php" method="POST">
        <label for="nom_utilisateur">Nom d'utilisateur:</label><br>
        <input type="text" id="nom_utilisateur" name="nom_utilisateur"><br><br>
        <label for="type_utilisateur">Type d'utilisateur:</label><br>
        <input type="text" id="type_utilisateur" name="type_utilisateur"><br><br>
        <input type="submit" value="Modifier">
    </form>
    </div>
</body>
</html>
