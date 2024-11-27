<?php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $requete = "SELECT * FROM voitures WHERE id = $id";
    $resultat = $conn->query($requete);
    $voiture = $resultat->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $immatriculation = $_POST['immatriculation'];
        $disponibilite = isset($_POST['disponibilite']) ? 1 : 0;

        $requete_update = "UPDATE voitures 
                           SET marque = '$marque', modele = '$modele', annee = '$annee', 
                               immatriculation = '$immatriculation', disponibilite = $disponibilite 
                           WHERE id = $id";

        if ($conn->query($requete_update) === TRUE) {
            echo "Les détails de la voiture ont été mis à jour avec succès.";
            header("Location: gerer_voitures.php"); 
            exit();
        } else {
            echo "Erreur : " . $conn->error;
        }
    }
} else {
    echo "ID de la voiture non fourni.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Voiture</title>
</head>
<body>
    <h1>Modifier les Détails de la Voiture</h1>
    <form method="POST">
        <label>Marque :</label>
        <input type="text" name="marque" value="<?= $voiture['marque'] ?>" required><br>
        <label>Modèle :</label>
        <input type="text" name="modele" value="<?= $voiture['modele'] ?>" required><br>
        <label>Année :</label>
        <input type="number" name="annee" value="<?= $voiture['annee'] ?>" required><br>
        <label>Immatriculation :</label>
        <input type="text" name="immatriculation" value="<?= $voiture['immatriculation'] ?>" required><br>
        <label>Disponibilité :</label>
        <input type="checkbox" name="disponibilite" <?= $voiture['disponibilite'] ? 'checked' : '' ?>><br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
