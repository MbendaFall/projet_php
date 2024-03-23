<?php
require_once("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_memoire = $_GET["id"]; // ID de la mémoire à modifier
    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];

    // Préparer et exécuter la requête SQL pour mettre à jour les informations de la mémoire
    $sql = "UPDATE memoires SET titre = ?, contenu = ? WHERE id_memoire = ?";
    $stmt = $connexion->prepare($sql);

    if ($stmt) {
        // Lier les paramètres et exécuter la requête
        $stmt->bind_param("ssi", $titre, $contenu, $id_memoire);
        $stmt->execute();

        // Redirection vers la page de gestion des mémoires après la modification
        header("Location: manage_memories.php");
        exit;
    } else {
        echo "Erreur de préparation de la requête.";
    }
} else {
    // Afficher le formulaire de modification avec les données de la mémoire à modifier pré-remplies
    if (isset($_GET["id"])) {
        $id_memoire = $_GET["id"];
        $sql = "SELECT * FROM memoires WHERE id_memoire = ?";
        $stmt = $connexion->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id_memoire);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $titre = $row["titre"];
                $contenu = $row["contenu"];
            } else {
                echo "Mémoire non trouvée.";
                exit;
            }
        } else {
            echo "Erreur de préparation de la requête.";
            exit;
        }
    } else {
        echo "ID de la mémoire non spécifié.";
        exit;
    }
}
?>
