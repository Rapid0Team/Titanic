<?php 
session_start();
$id = $_SESSION['id_client'];
include "connect.php";

$queryCheck = "SELECT * FROM client WHERE id_client = '$id'";
$result = mysqli_query($con, $queryCheck) or die("Error query check");
$client = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {
    extract($_POST);
    try {
        $birthDateTime = new DateTime($birthdate);
        $currentDateTime = new DateTime();
        $age = $currentDateTime->diff($birthDateTime)->y;
    } catch (Exception $e) {
        echo "<p class='pEreur'>Erreur lors du calcul de l'âge.</p>";
        exit;
    }
    $nom_complet = !empty($nom_complet) ? $nom_complet : $client['nom_complet'];
    $cin = !empty($cin) ? $cin : $client['cin'];
    $age = !empty($age) ? $age : $client['age'];
    $email = !empty($email) ? $email : $client['email'];
    $telephone = !empty($telephone) ? $telephone : $client['telephone'];
    $genre = !empty($genre) ? $genre : $client['genre'];
            // Requête de mise à jour
            $query = "UPDATE client SET nom_complet = '$nom_complet',
             cin = '$cin',
             age ='$age',
             email = '$email',
             telephone ='$telephone',
             genre ='$genre'
              WHERE id_client = $id";
            mysqli_query($con, $query) or die("Erreur de requête");
            
            // Redirection après la mise à jour
            header("Location: login.php");
            exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour les informations</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: green;
        }
        .tfo{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
            min-width: 60vh;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
        }
        .toggle-form-button {
            background-color: green;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .toggle-form-button:hover {
            background-color: black;
        }

        .form-container {
            max-width: 400px;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            display: none;
            transition: transform 0.3s ease;
            margin-bottom:15px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.2rem;
            text-align: center;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        button[type="submit"], button[type="reset"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        button[type="reset"] {
            background-color: #d9534f;
            color: white;
        }

        button[type="reset"]:hover {
            background-color: #c9302c;
        }   
    </style>
</head>
<body>
    <div class="tfo">
        <!-- Bouton pour afficher/masquer le formulaire en haut de la page -->
    <button class="toggle-form-button" onclick="toggleForm()">Ajouter Des Informations Personnel</button>

    <!-- Formulaire masqué par défaut, centré dans la page -->
    <div class="form-container" id="infoForm">
        <h2>Mettre à jour les informations</h2>
        <form method="post">
            <input type="text" id="fullname" name="nom_complet" placeholder="Nom Complet">
            <input type="text" id="cin" name="cin" placeholder="CIN">
            <input type="date" id="birthdate" name="birthdate" placeholder="Date de Naissance">
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="tel" id="telephone" name="telephone" placeholder="Téléphone">
            <select id="genre" name="genre">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
            <button type="submit" name="submit">Mettre à jour</button>
            <button type="reset">Supprimer</button>
        </form>
    </div>
    <a href="tableUsers.php"><button class="toggle-form-button" >Tablaux Users</button></a>
    <a href="addCar.php"><button class="toggle-form-button" >Tablaux Cars</button></a>

    </div>
        <script>
        function toggleForm() {
            const formContainer = document.getElementById('infoForm');
            formContainer.style.display = formContainer.style.display === 'none' || formContainer.style.display === '' ? 'block' : 'none';
        }
    </script>
</body>
</html>
