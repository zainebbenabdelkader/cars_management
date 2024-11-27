<?php
include '../includes/db.php';

// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer la voiture de la base de données
    $requete = "DELETE FROM voitures WHERE id = $id";

    if ($conn->query($requete) === TRUE) {
        echo "La voiture a été supprimée avec succès.";
    } else {
        echo "Erreur : " . $conn->error;
    }

    header("Location: gerer_voitures.php"); 
    exit();
} else {
    echo "ID de la voiture non fourni.";
}
?>
