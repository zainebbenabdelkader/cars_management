<?php
$serveur = "localhost";
$utilisateur = "root"; // Remplacez par votre configuration
$mot_de_passe = ""; // Remplacez par votre configuration
$base = "location_voitures";

$conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
