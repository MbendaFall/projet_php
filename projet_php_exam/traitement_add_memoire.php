<?php


// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si l'identifiant de l'utilisateur est défini dans la session
    if (!isset($_SESSION["id_utilisateur"])) {
        echo "Erreur : Identifiant de l'utilisateur non défini.";
        exit; // Arrête l'exécution du script
    }

    // Inclut le fichier de connexion à la base de données
    require_once "connexion.php";

    // Récupère les données du formulaire
    $titre = $_POST["titre"] ?? "";
    $contenu = $_POST["contenu"] ?? "";
    $theme = $_POST["theme"] ?? "";
    $domaine = $_POST["domaine"] ?? "";
    $id_utilisateur = $_POST["id_utilisateur"]; // Identifiant de l'utilisateur depuis la session

    // Vérifie si les champs requis sont vides
    if (empty($titre) || empty($contenu) || empty($theme) || empty($domaine)) {
        echo "Erreur : Tous les champs sont obligatoires.";
        exit; // Arrête l'exécution du script
    }

    // Prépare la requête SQL pour insérer une nouvelle mémoire
    $sql = "INSERT INTO memoires (titre, contenu, id_utilisateur, date_creation, theme, domaine) VALUES (?, ?, ?, NOW(), ?, ?)";
    $stmt = $connexion->prepare($sql);

    if ($stmt) {
        // Lie les paramètres et exécute la requête
        $stmt->bind_param("sssiss", $titre, $contenu, $id_utilisateur, $theme, $domaine);
        $stmt->execute();

        // Vérifie si l'insertion a réussi
        if ($stmt->affected_rows > 0) {
            echo "Mémoire ajoutée avec succès.";
        } else {
            echo "Erreur : Impossible d'ajouter la mémoire.";
        }

        // Ferme la déclaration
        $stmt->close();
    } else {
        echo "Erreur : Impossible de préparer la requête.";
    }

    // Ferme la connexion à la base de données
    $connexion->close();
}
?>
