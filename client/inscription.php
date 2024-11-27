<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);

    $role = 'utilisateur';

    $requete_verif = "SELECT * FROM Utilisateurs WHERE email = '$email'";
    $resultat_verif = $conn->query($requete_verif);

    if ($resultat_verif->num_rows > 0) {
        echo "Un compte avec cet email existe déjà.";
    } else {
        $requete = "INSERT INTO Utilisateurs (nom, adresse, telephone, email, mot_de_passe, role) 
                    VALUES ('$nom', '$adresse', '$telephone', '$email', '$mot_de_passe', '$role')";
        if ($conn->query($requete) === TRUE) {
            echo "Inscription réussie. <a href='connexion.php'>Connectez-vous ici</a>.";
        } else {
            echo "Erreur : " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription Utilisateur</h1>
    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" required><br>
        <label>Adresse :</label>
        <input type="text" name="adresse" required><br>
        <label>Téléphone :</label>
        <input type="text" name="telephone" required><br>
        <label>Email :</label>
        <input type="email" name="email" required><br>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br>
        <button type="submit">S'inscrire</button>
        <p>Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a></p>
    </form>
</body>
</html>
