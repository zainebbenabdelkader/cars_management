<?php
session_start();
if (!isset($_SESSION['Utilisateur_nom'])) {
    header("Location: connexion.php"); 
    exit();
}

    include '../includes/db.php';
    $requete = "SELECT * FROM voitures WHERE disponibilite = 1";
    $resultat = $conn->query($requete);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures Disponibles</title>
</head>
<body>
<h1>Bienvenue, <?= isset($_SESSION['Utilisateur_nom']) ? $_SESSION['Utilisateur_nom'] : 'Utilisateur' ?></h1>
    <h2>Liste des voitures disponibles</h2>

    <?php if ($resultat->num_rows > 0) { ?>
        <table border="1">
            <tr>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Année</th>
                <th>Immatriculation</th>
                <th>Action</th>
            </tr>
            <?php while ($voiture = $resultat->fetch_assoc()) { ?>
                <tr>
                    <td><?= $voiture['marque'] ?></td>
                    <td><?= $voiture['modele'] ?></td>
                    <td><?= $voiture['annee'] ?></td>
                    <td><?= $voiture['immatriculation'] ?></td>
                    <td>
                        <a href="reserver.php?voiture_id=<?= $voiture['id'] ?>">Réserver</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Aucune voiture disponible pour le moment.</p>
    <?php } ?>
</body>
</html>
