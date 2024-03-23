<?php
require_once("connexion.php");

if (!isset($_SESSION["id_utilisateur"])) {
    header("Location: login.php");
    exit;
}

$sqlMemoires = "SELECT * FROM memoires";
$resultMemoires = $connexion->query($sqlMemoires);

$sqlUtilisateurs = "SELECT * FROM utilisateurs";
$resultUtilisateurs = $connexion->query($sqlUtilisateurs);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_dashboard.css">
    <title>Tableau de bord administrateur</title>
    

</head>
<body>
     <!-- Menu -->
     <div class="menu-container">
        <a href="Accueil.php">Accueil</a> | 
        <a href="inscription.php">Ajouter un utilisateur</a> | 
        <a href="add_memoire.php">Ajouter un mémoire</a> | 
        <a href="dashboard_etudiant.php">Tableau de bord Etudiant</a> |
        <a href="index.php">Déconnexion</a>
    </div>
    <h1>Tableau de bord administrateur</h1>
        <div class="container">         
    <?php
    // Afficher les informations sur les mémoires s'il y en a
    if ($resultMemoires && $resultMemoires->num_rows > 0) {
        echo "<h2>Gestion des mémoires</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Titre</th><th>Contenu</th><th>Actions</th></tr>";
        // Stocker les résultats dans un tableau
        $memoires_data = $resultMemoires->fetch_all(MYSQLI_ASSOC);
        foreach ($memoires_data as $row) {
            echo "<tr>";
            echo "<td>" . $row["id_memoire"] . "</td>";
            echo "<td>" . $row["titre"] . "</td>";
            echo "<td>" . $row["contenu"] . "</td>";
            // Boutons d'actions
            echo "<td class='action-buttons'>";
            echo "<a href='edit_memoire.php?id=" . $row["id_memoire"] . "' class='modify'>Modifier</a>";
            echo "<a href='delete_memoire.php?id=" . $row["id_memoire"] . "' class='delete'>Supprimer</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>Gestion des mémoires</h2>";
        echo "<p>Aucune mémoire à afficher.</p>";
    }
   
    // Afficher les informations sur les comptes utilisateurs s'il y en a
    if ($resultUtilisateurs && $resultUtilisateurs->num_rows > 0) {
        echo "<h2>Gestion des comptes utilisateurs</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Nom d'utilisateur</th><th>Type d'utilisateur</th><th>Actions</th></tr>";
        // Stocker les résultats dans un tableau
        $utilisateurs_data = $resultUtilisateurs->fetch_all(MYSQLI_ASSOC);
        foreach ($utilisateurs_data as $row) {
            echo "<tr>";
            echo "<td>" . $row["id_utilisateur"] . "</td>";
            echo "<td>" . $row["nom_utilisateur"] . "</td>";
            echo "<td>" . $row["type_utilisateur"] . "</td>";
            // Boutons d'actions
            echo "<td class='action-buttons'>";
            echo "<a href='modify_user.php?id=" . $row["id_utilisateur"] . "' class='modify'>Modifier</a>";
            echo "<a href='delete_user.php?id=" . $row["id_utilisateur"] . "' class='delete'>Supprimer</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>Gestion des comptes utilisateurs</h2>";
        echo "<p>Aucun utilisateur à afficher.</p>";
    }
    ?>
     </div>
    <!-- Ajoutez ici d'autres fonctionnalités et options de gestion des données selon les besoins -->

</body>
</html>
