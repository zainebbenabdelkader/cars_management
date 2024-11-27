<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Voiture</title>
</head>
<body>
    <h1>Ajouter une Nouvelle Voiture</h1>
    <form method="POST" action="">
        <label>Marque :</label>
        <input type="text" name="marque" required><br>
        <label>Modèle :</label>
        <input type="text" name="modele" required><br>
        <label>Année :</label>
        <input type="number" name="annee" required><br>
        <label>Immatriculation :</label>
        <input type="text" name="immatriculation" required><br>
        <button type="submit">Ajouter</button>
    </form>

    <?php
    include '../includes/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $immatriculation = $_POST['immatriculation'];

        $requete = "INSERT INTO voitures (marque, modele, annee, immatriculation, disponibilite) 
                    VALUES ('$marque', '$modele', '$annee', '$immatriculation', 1)";
        if ($conn->query($requete) === TRUE) {
            echo "Voiture ajoutée avec succès.";
            header("Location: gerer_voitures.php"); 
            exit();
        } else {
            echo "Erreur : " . $conn->error;
        }
    }
    ?>
</body>
</html>
