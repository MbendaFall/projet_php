<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_utilisateur = $_GET["id_utilisateur"]; // ID de l'utilisateur à modifier
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $type_utilisateur = $_POST["type_utilisateur"];

    // Préparer et exécuter la requête SQL pour mettre à jour les informations de l'utilisateur
    $sql = "UPDATE utilisateurs SET nom_utilisateur = ?, type_utilisateur = ? WHERE id_utilisateur = ?";
    $stmt = $connexion->prepare($sql);

    if ($stmt) {
        // Lier les paramètres et exécuter la requête
        $stmt->bind_param("ssi", $nom_utilisateur, $type_utilisateur, $id_utilisateur);
        $stmt->execute();

        // Redirection vers la page de gestion des utilisateurs après la modification
        header("Location: dashboard_admin.php");
        exit;
    } else {
        echo "Erreur de préparation de la requête.";
    }
} else {
    // Afficher le formulaire de modification avec les données de l'utilisateur à modifier pré-remplies
    if (isset($_GET["id"])) {
        $id_utilisateur = $_GET["id"];
        $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = ?";
        $stmt = $connexion->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id_utilisateur);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $nom_utilisateur = $row["nom_utilisateur"];
                $type_utilisateur = $row["type_utilisateur"];
            } else {
                echo "Utilisateur non trouvé.";
                exit;
            }
        } else {
            echo "Erreur de préparation de la requête.";
            exit;
        }
    } else {
        echo "ID de l'utilisateur non spécifié.";
        exit;
    }
}
?>
