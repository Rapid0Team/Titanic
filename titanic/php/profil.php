<?php
session_start();
$id = $_SESSION['id_client'];
include "connect.php";


// Récupérer les informations du client directement depuis la base de données
$query = "SELECT * FROM client WHERE id_client = $id";
$result = mysqli_query($con, $query);


$row = mysqli_fetch_array($result);

// Mise à jour du profil utilisateur
if (isset($_POST['submit'])) {
    // Récupération des données directement depuis le formulaire
    $nom_complet = $_POST['nom_complet'];
    $username = $_POST['username'];
    $cin = $_POST['cin'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $genre = $_POST['genre'];

    // Construction de la requête SQL
    $update_query = "
        UPDATE client SET
            nom_complet = '$nom_complet',
            username = '$username',
            cin = '$cin',
            age = '$birthdate',
            email = '$email',
            telephone = '$telephone',
            password = '$password',
            genre = '$genre'
        WHERE id_client = $id
    ";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Mise à jour réussie.');</script>";
        echo "<script>setTimeout(() => { window.location.href = 'profil.php'; }, 1000);</script>";
    } else {
        echo "<script>alert('Erreur lors de la mise à jour.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire De Profil</title>
    <link rel="stylesheet" href="../css/profil.css">
</head>
<body>
    <div class="container">
        <h2>Mon Profil</h2>
        <form method="post">
            <!-- Ligne 1 -->
            <div class="chaque-form">
                <div class="les-input">
                    <input type="text" id="fullname" value="<?= $row['nom_complet'] ?>" name="nom_complet" required> 
                </div>
                <div class="les-input">
                    <input type="text" id="username" name="username" value="<?= $row['username'] ?>" required>
                </div>
            </div>

            <!-- Ligne 2 -->
            <div class="chaque-form">
                <div class="les-input">
                    <input type="text" id="cin" name="cin" value="<?= $row['cin'] ?>" required>
                </div>
                <div class="les-input">
                    <input type="number" id="birthdate" name="birthdate" value="<?= $row['age'] ?>" required>
                </div>
            </div>

            <!-- Ligne 3 -->
            <div class="chaque-form">
                <div class="les-input">
                    <input type="email" id="email" name="email" value="<?= $row['email'] ?>" required>
                </div>
                <div class="les-input">
                    <input type="tel" id="telephone" name="telephone" value="<?= $row['telephone'] ?>" required>
                </div>
            </div>

            <!-- Ligne 4 -->
            <div class="chaque-form">
                <div class="les-input">
                    <input type="text" id="password" name="password" value="<?= $row['password'] ?>" required>
                </div>
                <div class="les-input">
                    <select id="genre" name="genre" required>
                        <option value="homme" <?= $row['genre'] == 'homme' ? 'selected' : '' ?>>Homme</option>
                        <option value="femme" <?= $row['genre'] == 'femme' ? 'selected' : '' ?>>Femme</option>
                    </select>
                </div>
            </div>

            <!-- Boutons -->
            <div class="button-group">
                <button type="submit" name="submit">Modifier</button>
                <button type="reset">Annuler</button>
            </div>
        </form>
        <div>
            <a href="home.php" id="revenir">revenir</a>
        </div>
    </div>
</body>
</html>
