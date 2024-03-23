<?php
// Connexion à la base de données
require_once("connexion.php");

if(isset($_GET['id'])) {
    // Récupération de l'identifiant du mémoire à télécharger
    $id = $_GET['id'];

    // Requête SQL pour récupérer le chemin du fichier à télécharger
    $sql = "SELECT chemin_fichier FROM memoires WHERE id_memoire = $id";
    $result = $connexion->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fichier = $row['chemin_fichier'];

        // Chemin où se trouve les fichiers mémoires
        $chemin = "chemin/vers/dossier/memoires/";

        // Chemin complet du fichier à télécharger
        $cheminFichier = $chemin . $fichier;

        // Vérifier si le fichier existe
        if(file_exists($cheminFichier)) {
            // Télécharger le fichier
            header("Content-Type: application/pdf");
            header("Content-Disposition: attachment; filename=" . basename($cheminFichier));
            readfile($cheminFichier);
            exit;
        } else {
            echo "Le fichier n'existe pas.";
        }
    } else {
        echo "Mémoire non trouvé.";
    }
} else {
    echo "ID de mémoire non spécifié.";
}
?>
