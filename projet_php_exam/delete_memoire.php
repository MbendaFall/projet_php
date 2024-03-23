<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_web.css">
    <title>Supprimer une mémoire</title>
</head>
<body>
    <div class="contenu">
    <h1>Supprimer une mémoire</h1>
    <p>Êtes-vous sûr de vouloir supprimer cette mémoire ? Cette action est irréversible.</p>
    <form action="traitement_delete_memoire.php" method="post">
        <input type="hidden" name="id_memoire" value="<?php echo $param_id; ?>">
        <input type="submit" value="Confirmer la suppression">
    </form>
    <br>
    <button class="btn"><a href="dashboard_admin.php">Annuler</a></button>
    </div>
</body>
</html>
