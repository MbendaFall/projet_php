
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_dashbord_etudiant.css">
    <title>Tableau de bord de l'étudiant</title>
</head>
<body>
    <!-- Menu -->
     <div class="menu-container">
        <a href="Accueil.php">Accueil</a> | 
        <a href="inscription.php">Ajouter un utilisateur</a> | 
        <a href="add_memoire.php">Ajouter un mémoire</a> | 
        <a href="index.php">Déconnexion</a>
    </div>
    <div class="contenu">
        <h1>Bienvenue !</h1>
   

    <!-- Section de recherche de mémoires -->
    <div class="memoires-section">
        <h2>Rechercher des mémoires</h2>
        <form action="" method="GET">
            <input type="text" name="recherche" placeholder="Rechercher par thème ou domaine">
            <a href="search_memo.php"><input type="submit" value="Rechercher"></a>
        </form>
            <br>
            <br>
            <!-- Tableau de mémoires disponibles -->
        <table>
            <tr>
                <th>Titre</th>
                <th>Thème</th>
                <th>Domaine</th>
                <th>Télécharger</th>
            </tr>
            <?php
            // Connexion à la base de données
            require_once("connexion.php");

            // Requête SQL pour récupérer les mémoires disponibles
            $sql = "SELECT * FROM memoires";
            $result = $connexion->query($sql);

            // Affichage des mémoires dans le tableau
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["titre"] . "</td>";
                    echo "<td>" . $row["theme"] . "</td>";
                    echo "<td>" . $row["domaine"] . "</td>";
                    echo "<td><a href='telecharger_memoire.php?id=" . $row["id_memoire"] . "' download style='background-color: #4CAF50; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none;'>Télécharger</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Aucun mémoire disponible.</td></tr>";
            }
            ?>
        </table>
    </div>
    </div>
</body>
</html>
