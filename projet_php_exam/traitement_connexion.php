<?php


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure votre fichier de connexion à la base de données
    include_once "connexion.php";

    // Récupérer les données du formulaire
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Préparer la requête SQL pour vérifier les identifiants de connexion
    $sql = "SELECT id_utilisateur, nom_utilisateur, mot_de_passe, type_utilisateur FROM utilisateurs WHERE nom_utilisateur = ?";
    $stmt = $connexion->prepare($sql);

    if ($stmt) {
        // Lier les paramètres et exécuter la requête
        $stmt->bind_param("s", $nom_utilisateur);
        $stmt->execute();

        // Récupérer le résultat de la requête
        $result = $stmt->get_result();

        // Vérifier si l'utilisateur existe dans la base de données
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Vérifier si le mot de passe est correct
            if (password_verify($mot_de_passe, $row["mot_de_passe"])) {
                // Stocker les informations de l'utilisateur dans des variables de session
                $_SESSION["id_utilisateur"] = $row["id_utilisateur"];
                $_SESSION["nom_utilisateur"] = $row["nom_utilisateur"];
                $_SESSION["type_utilisateur"] = $row["type_utilisateur"];
                
                // Redirection vers la page de tableau de bord appropriée
                if ($_SESSION["type_utilisateur"] === "administrateur") {
                    header("Location: dashboard_admin.php");
                    exit;
                } elseif ($_SESSION["type_utilisateur"] === "étudiant") {
                    header("Location: dashboard_etudiant.php");
                    exit;
                }
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Nom d'utilisateur incorrect.";
        }

        // Fermer la déclaration
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête.";
    }

    // Fermer la connexion à la base de données
    $connexion->close();
}
?>
