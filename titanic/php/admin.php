<?php 
session_start();
$id = $_SESSION['id_client'];
include "./connect.php";
$message = "";

// Vérifier les informations du client
$queryCheck = "SELECT * FROM client WHERE id_client = '$id'";
$result = mysqli_query($con, $queryCheck) or die("Error query check");
$client = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    extract($_POST);
    
    if (!empty($password) && !empty($nom_admin)) {
        if ($password === $client['password'] && $nom_admin === $client['username']) {
            // Utiliser les nouvelles valeurs, ou les valeurs existantes si les champs sont vides
            $new_nom_admin = !empty($new_nom_admin) ? $new_nom_admin : $client['username'];
            $new_password = !empty($new_password) ? $new_password : $client['password'];
            
            // Requête de mise à jour
            $query = "UPDATE client SET username = '$new_nom_admin', password = '$new_password' WHERE id_client = $id";
            mysqli_query($con, $query) or die("Erreur de requête");
            
            // Redirection après la mise à jour
            header("Location: login.php");
            exit;
        } else {
            $message = "<p style='color:red; text-align:center;'>Password Incorrect !</p>";
        }
    } else {
        $message = "<p style='color:red; text-align:center;'>Insérer Votre Password !</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour des informations</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: green;
            margin: 0;
        }
        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: grey;
            color :black;
        }
        p {
            margin: 0;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Mise à jour de vos informations</h2>
        <input type="text" name="nom_admin" placeholder="Nom d'utilisateur actuel"><br>
        <input type="password" name="password" placeholder="Mot de passe actuel"><br>
        <input type="text" name="new_nom_admin" placeholder="Nouveau nom d'utilisateur"><br>
        <input type="password" name="new_password" placeholder="Nouveau mot de passe"><br>
        <input type="submit" name="submit" value="Mettre à jour">
        <a href="admin2.php"><input type="button" value="Annuler"></a>
        <?php echo "<div class='error'>$message</div>"; ?>
    </form>
</body>
</html>
