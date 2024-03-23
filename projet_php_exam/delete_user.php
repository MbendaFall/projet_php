<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_web.css">
    <title>Supprimer un utilisateur</title>
</head>
<body>
    <div class="contenu">
    <h2>Supprimer un utilisateur</h2>
    <form action="traitement_delete_user.php" method="post">
        <label for="id_utilisateur">ID de l'utilisateur à supprimer :</label><br>
        <input type="text" id="id_utilisateur" name="id_utilisateur"><br><br>
        <input type="submit" value="Supprimer">
    </form>
    <br>
    <button type="submit" class="btn"><a href="dashboard_admin.php">retour</a></button>
    </div>
</body>
</html>
