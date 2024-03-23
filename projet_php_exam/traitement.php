<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si toutes les données ont été correctement soumises
    if (isset($_POST["nom_utilisateur"], $_POST["mot_de_passe"], $_POST["type_utilisateur"])) {
        // Inclure votre fichier de connexion à la base de données
        include_once "connexion.php";

        // Récupérer les données du formulaire
        $nom_utilisateur = $_POST["nom_utilisateur"];
        $mot_de_passe = $_POST["mot_de_passe"];
        $type_utilisateur = $_POST["type_utilisateur"];

        // Vérifier si le nom d'utilisateur n'est pas vide
        if (empty($nom_utilisateur)) {
            echo "Le nom d'utilisateur ne peut pas être vide.";
            exit; // Arrêter l'exécution du script
        }

        // Vérifier si le mot de passe n'est pas vide et a une longueur suffisante
        if (empty($mot_de_passe) || strlen($mot_de_passe) < 6) {
            echo "Le mot de passe doit contenir au moins 6 caractères.";
            exit; // Arrêter l'exécution du script
        }

        // Préparer la requête SQL pour insérer un nouvel utilisateur
        $sql = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe, type_utilisateur) VALUES (?, ?, ?)";
        $stmt = $connexion->prepare($sql);

        if ($stmt) {

            // Lier les paramètres et exécuter la requête
            $stmt->bind_param("sss", $nom_utilisateur, $mot_de_passe, $type_utilisateur);
            $stmt->execute();

            // Vérifier si l'insertion a réussi
            header("Location: index.php");
            if ($stmt->affected_rows > 0) {
                echo "Utilisateur inscrit avec succès.";
            } else {
                echo "Erreur lors de l'inscription de l'utilisateur.";
            }

            // Fermer la déclaration
            $stmt->close();
        } else {
            echo "Erreur de préparation de la requête.";
        }

        // Fermer la connexion à la base de données
        $connexion->close();
    } else {
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}
?>

