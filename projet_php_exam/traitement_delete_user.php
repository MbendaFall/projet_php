<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'ID de l'utilisateur à supprimer est présent dans la requête
    if (isset($_POST["id_utilisateur"])) {
        $id_utilisateur = $_POST["id_utilisateur"];

        // Préparer la requête SQL pour supprimer l'utilisateur
        $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = ?";
        $stmt = $connexion->prepare($sql);

        if ($stmt) {
            // Lier les paramètres et exécuter la requête
            $stmt->bind_param("i", $id_utilisateur);
            $stmt->execute();

            // Vérifier si la suppression a réussi
            if ($stmt->affected_rows > 0) {
                echo "L'utilisateur a été supprimé avec succès.";
            } else {
                echo "Erreur lors de la suppression de l'utilisateur.";
            }

            // Fermer la déclaration
            $stmt->close();
        } else {
            echo "Erreur de préparation de la requête.";
        }
    } else {
        echo "ID de l'utilisateur à supprimer non fourni.";
    }
}
?>
