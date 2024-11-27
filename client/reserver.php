<?php
    include '../includes/db.php';
    session_start();


$voiture_id = $_GET['voiture_id'];
$Utilisateur_id = $_SESSION['Utilisateur_id'];

$requete = "INSERT INTO reservations (Utilisateur_id, voiture_id, date_debut, date_fin) 
            VALUES ($Utilisateur_id, $voiture_id, NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY))";

if ($conn->query($requete) === TRUE) {
    $update_voiture = "UPDATE voitures SET disponibilite = 0 WHERE id = $voiture_id";
    $conn->query($update_voiture);

    echo "Réservation confirmée pour 7 jours.";
    echo "<a href='rechercher.php'>Retour à la liste</a>";
} else {
    echo "Erreur : " . $conn->error;
}
?>
