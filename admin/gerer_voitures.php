<?php
include '../includes/db.php';

if (isset($_GET['supprimer_id'])) {
    $id = $_GET['supprimer_id'];
    $conn->query("DELETE FROM voitures WHERE id = $id");
}

$resultat = $conn->query("SELECT * FROM voitures");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Voitures</title>
</head>
<body>
    <h1>Liste des Voitures</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Année</th>
            <th>Immatriculation</th>
            <th>Disponibilité</th>
            <th>Actions</th>
        </tr>
        <?php while ($voiture = $resultat->fetch_assoc()): ?>
        <tr>
            <td><?= $voiture['id'] ?></td>
            <td><?= $voiture['marque'] ?></td>
            <td><?= $voiture['modele'] ?></td>
            <td><?= $voiture['annee'] ?></td>
            <td><?= $voiture['immatriculation'] ?></td>
            <td><?= $voiture['disponibilite'] ? 'Disponible' : 'Non disponible' ?></td>
            <td>
    <a href="modifier_voiture.php?id=<?= $voiture['id'] ?>">Modifier</a>
    <a href="supprimer_voiture.php?id=<?= $voiture['id'] ?>" 
       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?');">Supprimer</a>
</td>


        </tr>

        <?php endwhile; ?>
    </table>        <a href="ajouter_voiture.php">Ajouter</a>

</body>
</html>
