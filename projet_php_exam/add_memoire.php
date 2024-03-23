<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style_web.css">
    <title>Ajouter une mémoire</title>
</head>
<body>
    
    <div class="contenu"> 
    <h1>Ajouter une mémoire</h1>
    <form action="traitement_add_memoire.php" method="post">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br>
        <label for="contenu">Contenu :</label><br>
        <textarea id="contenu" name="contenu" rows="4" cols="50" required></textarea><br>
        <label for="theme">Thème :</label>
        <input type="text" id="theme" name="theme" required><br>
        <label for="domaine">Domaine :</label>
        <input type="text" id="domaine" name="domaine" required><br>
        <label for="id_utilisateur">id_utilisateur:</label>
        <input type="text" id="id_utilisatuer" name="id_utilisateur" required><br>
        <input type="submit" value="Ajouter">
    </form>
    </div>
</body>
</html>
