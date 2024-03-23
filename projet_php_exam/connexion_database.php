<?php
// Démarrer la session
include_once("connexion.php");



// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Inclure le fichier de connexion à la base de données
    require_once "connexion.php";

    // Récupérer les informations de connexion soumises via le formulaire
    $username = $_GET["nom_utilisateur"] ?? "";
    $password = $_GET["mot_de_passe"] ?? "";

    // Préparer la requête SQL pour vérifier les informations de connexion
    $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ? AND mot_de_passe = ?";
    $stmt = $connexion->prepare($sql);

    if ($stmt) {
        // Lier les paramètres et exécuter la requête
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        // Récupérer le résultat de la requête
        $result = $stmt->get_result();

        // Vérifier si l'utilisateur existe dans la base de données
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION["id_utilisateur"] = $user["id_utilisateur"];
            $_SESSION["type_utilisateur"] = $user["type_utilisateur"];

            // Rediriger l'utilisateur vers son tableau de bord après la connexion
            if ($user["type_utilisateur"] === "administrateur") {
                header("Location: dashboard_admin.php");
            } elseif ($user["type_utilisateur"] === "étudiant") {
                header("Location: dashboard_etudiant.php");
            }
            exit;
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }

        // Fermer la déclaration et la connexion à la base de données
        $stmt->close();
        $connexion->close();
    } else {
        echo "Erreur : Impossible de préparer la requête.";
    }
}
?>
