<?php
$id = $_GET['id'];
include "connect.php";
$query = "SELECT * from client where id_client = $id";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    extract($_POST);
    $query = "UPDATE client set
        `nom_complet`='$nom_complet',
        `username`='$username',
        `email`='$email',
        `telephone`='$telephone',
        `password`='$password',
        `genre`='$genre'
        WHERE id_client = $id
    ";
    mysqli_query($con, $query);
    header("location:tableUsers.php");
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Inscription</title>
    <!-- Lien vers le fichier CSS externe pour le style -->
    <link rel="stylesheet" href="../css/sign-up.css">
    <style>
        body {
            background-color: black;
        }

        h1 {
            text-align: center;
            margin-bottom: 1em;
            user-select: none;
        }

        .revenir {
            background-color: green;
            color: white;
        }
        .revenir a{
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Conteneur principal du formulaire -->
    <div class="container">
        <h1>Utilisateur n°<?= $user['id_client'] ?></h1>

        <form method="post">
            <!-- Première ligne de champs de formulaire (Nom Complet et Nom d'utilisateur) -->
            <div class="chaque-form">
                <div class="les-input">
                    <input type="text" id="fullname" value="<?= $user['nom_complet'] ?>" name="nom_complet" placeholder="Nom Complet" required>
                </div>
                <div class="les-input">
                    <input type="text" id="username" value="<?= $user['username'] ?>" name="username" placeholder="Nom Pour L'utilisation" required>
                </div>
            </div>


            <!-- Troisième ligne de champs de formulaire (Email et Téléphone) -->
            <div class="chaque-form">
                <div class="les-input">
                    <input type="email" id="email" value="<?= $user['email'] ?>" name="email" placeholder="Email" required>
                </div>
                <div class="les-input">
                    <input type="tel" id="telephone" value="<?= $user['telephone'] ?>" name="telephone" placeholder="Téléphone" required>
                </div>
            </div>

            <!-- Quatrième ligne de champs de formulaire (Mot de Passe et Genre) -->
            <div class="chaque-form">
                <div class="les-input">
                    <input type="text" id="password" value="<?= $user['password'] ?>" name="password" placeholder="Mot de Passe" required>
                </div>
                <div class="les-input">
                    <select id="genre" name="genre" required>
                        <option value="Homme" <?= $user['genre'] == 'Homme' ? 'selected' : ''; ?>>Homme</option>
                        <option value="Femme" <?= $user['genre'] == 'Femme' ? 'selected' : ''; ?>>Femme</option>
                    </select>
                </div>
            </div>

            <!-- Boutons de soumission et de réinitialisation -->
            <div class="button-group">
                <button type="submit" name="submit">Modifier</button>
                <button class="revenir"><a href="tableUsers.php">Revenir</a></button>
            </div>

        </form>

    </div>
</body>

</html>