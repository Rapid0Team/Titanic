<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Inscription</title>
    <!-- Lien vers le fichier CSS externe pour le style -->
    <link rel="stylesheet" href="../css/sign-up.css">
    
</head>
<body>

    <!-- Conteneur principal du formulaire -->
    <div class="container">
        <h2>Inscription Utilisateur</h2>
        
        <form  method="post">
    <!-- Première ligne de champs de formulaire (Nom Complet et Nom d'utilisateur) -->
    <div class="chaque-form">
        <div class="les-input">
            <input type="text" id="fullname" name="nom_complet" placeholder="Nom Complet" required> 
        </div>
        <div class="les-input">
            <input type="text" id="username" name="username" placeholder="Nom Pour L'utilisation" required>
        </div>
    </div>

    <!-- Deuxième ligne de champs de formulaire (CIN et Date de Naissance) -->
    <div class="chaque-form">
        <div class="les-input">
            <input type="text" id="cin" name="cin"  placeholder="CIN"required>
        </div>
        <div class="les-input">
            <input type="date" id="birthdate" name="birthdate" placeholder="Date de Naissance" required>
        </div>
    </div>

    <!-- Troisième ligne de champs de formulaire (Email et Téléphone) -->
    <div class="chaque-form">
        <div class="les-input">
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="les-input">
            <input type="tel" id="telephone" name="telephone" placeholder="Téléphone" required>
        </div>
    </div>

    <!-- Quatrième ligne de champs de formulaire (Mot de Passe et Genre) -->
    <div class="chaque-form">
        <div class="les-input">
            <input type="password" id="password" name="password" placeholder="Mot de Passe" required>
        </div>
        <div class="les-input">
            <select id="genre" name="genre" required>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>
    </div>

    <div>
    <?php 
if (isset($_POST['submit'])) {

    include "connect.php";  // Connexion à la base de données

    extract($_POST);

    // Vérification des doublons
    $queryUsr = "SELECT * FROM client WHERE username = '$username'";
    $queryCin = "SELECT * FROM client WHERE cin = '$cin'";
    $queryEmail = "SELECT * FROM client WHERE email = '$email'";
    $queryTel = "SELECT * FROM client WHERE telephone = '$telephone'";

    $resultUsr = mysqli_query($con, $queryUsr);
    $resultCin = mysqli_query($con, $queryCin);
    $resultEmail = mysqli_query($con, $queryEmail);
    $resultTel = mysqli_query($con, $queryTel);

    // Vérifier si un utilisateur avec les mêmes informations existe déjà
    if (mysqli_num_rows($resultUsr) > 0 && mysqli_num_rows($resultCin) > 0 && mysqli_num_rows($resultEmail) > 0 && mysqli_num_rows($resultTel) > 0) {
        echo "<p class='pEreur'>Ce nom d'utilisateur, CNI et email sont déjà utilisés.</p>";
    } elseif (mysqli_num_rows($resultUsr) > 0) {
        echo "<p class='pEreur'>Ce nom d'utilisateur est déjà utilisé.</p>";
    } elseif (mysqli_num_rows($resultCin) > 0) {
        echo "<p class='pEreur'>Ce CIN est déjà utilisé.</p>";
    } elseif (mysqli_num_rows($resultEmail) > 0) {
        echo "<p class='pEreur'>Cet email est déjà utilisé.</p>";
    }elseif (mysqli_num_rows($resultTel) > 0) {
    echo "<p class='pEreur'>Ce numéro telephone est déjà utilisé.</p>";
    }else {
        // Calculer l'âge à partir de la date de naissance
            // Calculer l'âge à partir de la date de naissance
            try {
                $birthDateTime = new DateTime($birthdate);
                $currentDateTime = new DateTime();
                $age = $currentDateTime->diff($birthDateTime)->y;
            } catch (Exception $e) {
                echo "<p class='pEreur'>Erreur lors du calcul de l'âge.</p>";
                exit;
            }
        

        // Requête d'insertion
        $queryInsert = "INSERT INTO `client`(`id_client`, `nom_complet`, `username`, `cin`, `age`, `email`, `telephone`, `password`, `genre`, `role`)
                        VALUES (NULL, '$nom_complet', '$username', '$cin', '$age', '$email', '$telephone', '$password', '$genre','user')";

        // Exécuter la requête d'insertion
        mysqli_query($con, $queryInsert) or die("Erreur lors de l'insertion des données");

        // Rediriger l'utilisateur après l'insertion
        header("Location: login.php");
    }
}
?>
    </div>
    <!-- Boutons de soumission et de réinitialisation -->
    <div class="button-group">
        <button type="submit" name="submit">S'inscrire</button>
        <button type="reset">Annuler</button>
    </div>

    <div>
        <a href="login.php" id="seconnecter">Se Connecter</a>
    </div>
</form>

    </div>
</body>
</html>
