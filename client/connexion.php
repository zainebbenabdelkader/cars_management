<?php
include '../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $requete = "SELECT * FROM Utilisateurs WHERE email = '$email'";
    $resultat = $conn->query($requete);

    if ($resultat->num_rows > 0) {
        $Utilisateur = $resultat->fetch_assoc();
        if (password_verify($mot_de_passe, $Utilisateur['mot_de_passe'])) {
            $_SESSION['Utilisateur_id'] = $Utilisateur['id'];
            $_SESSION['Utilisateur_nom'] = $Utilisateur['nom'];

            if ($Utilisateur['role'] == 'admin') {
                header("Location: ../admin/gerer_voitures.php");
                exit();
            } else {
                header("Location: rechercher.php");
                exit();
            }
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Email non trouvé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion Utilisateur</h1>
    <form method="POST">
        <label>Email :</label>
        <input type="email" name="email" required><br>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br>
        <button type="submit">Se connecter</button>
        <p>Vous n'avez pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>
    </form>
</body>
</html>
