<?php
include "connect.php";
$message = "";
if (isset($_POST['submit'])) {
    extract($_POST);
    $checkVIN = "SELECT * from cars where vin = '$vin'";
    $result = mysqli_query($con, $checkVIN);

    if (mysqli_num_rows($result) > 0) {
        $message = "VIN est déjà existe !";
    } else {
        $source = $_FILES['photo']['tmp_name'];
        $destination = '../photosCars/' . $_FILES['photo']['name'];
        move_uploaded_file($source, $destination);
        $query = "INSERT INTO `cars`(`id_cars`, `marque`, `model`, `annee`, `vin`, `prix`, `type_moteur`, `transmission`, `couleur`, `kilometre`, `nom_proprietaire`, `numero_plaque`, `etat_region`, `statut_actuel`, `Commentaires_Notes`, `photo`) 
                  VALUES (null, '$marque', '$model', '$annee', '$vin', '$prix', '$type', '$transmission', '$couleur', '$kilometre', '$nom_proprietaire', '$numero_plaque', '$etat_region', '$statut_actuel', '$Commentaires_Notes', '$destination')
                  ";
        mysqli_query($con, $query);
        header('location:tableCars.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/addCar.css">
    <style>
        .a{
            text-align: center;
            margin-top: 2em;
        }
        .a a{
            text-decoration: none;
            color: #fff;
            border: 1px solid #fff;
            background-color: green;
            padding: 10px 20px;
            border-radius: 2em;
            transition: .6s ease;
        }
        .a a:hover{
            text-decoration: none;
            color: green;
            border: 1px solid green;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 2em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form">
            <h1>Ajouter Voitures</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Détails de la Voiture</h3>
                <div class="infos">
                    <div class="info">
                        <label for="marque">Marque :</label>
                        <input type="text" name="marque" id="marque">
                    </div>
                    <div class="info">
                        <label for="model">Modèle :</label>
                        <input type="text" name="model" id="model">
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <label for="annee">Année :</label>
                        <input type="number" name="annee" id="annee">
                    </div>
                    <div class="info">
                        <label for="vin">VIN :</label>
                        <input type="text" name="vin" id="vin" placeholder="Numéro d’identification du véhicule...">
                        <p style='color:red; text-align:center; background-color: pink;'><?= $message; ?></p>
                        
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <label for="prix">Prix :</label>
                        <input type="number" name="prix" id="prix">
                    </div>
                </div>

                <h3>Spécifications</h3>
                <div class="infos">
                    <div class="info">
                        <select name="type" id="type">
                            <option value="ne pas sélectionner" selected>Type de moteur</option>
                            <option value="diesel">Diesel</option>
                            <option value="essence">Essence</option>
                            <option value="electrique">Électrique</option>
                            <option value="hybride">Hybride</option>
                        </select>
                    </div>
                    <div class="info">
                        <select name="transmission" id="transmission">
                            <option value="ne pas sélectionner" selected>Transmission</option>
                            <option value="manuelle">Manuelle</option>
                            <option value="automatique">Automatique</option>
                            <option value="CVT">CVT</option>
                        </select>
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <label for="couleur">Couleur :</label>
                        <input type="color" name="couleur" id="couleur">
                    </div>
                    <div class="info">
                        <label for="km">Kilométrage :</label>
                        <input type="number" name="kilometre" id="km">
                    </div>
                </div>

                <h3>Propriétaire et Statut</h3>
                <div class="infos">
                    <div class="info">
                        <label for="nom_proprietaire">Nom du propriétaire :</label>
                        <input type="text" name="nom_proprietaire" id="nom_proprietaire">
                    </div>
                    <div class="info">
                        <label for="NP">Numéro de plaque d’immatriculation :</label>
                        <input type="text" name="numero_plaque" id="NP">
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <label for="etat_region">État/Région d’immatriculation :</label>
                        <input type="text" name="etat_region" id="etat_region">
                    </div>
                    <div class="info">
                        <select name="statut_actuel" id="statut_actuel">
                            <option value="ne pas sélectionner" selected>Statut actuel</option>
                            <option value="Disponible">Disponible</option>
                            <option value="En_attente">En attente</option>
                            <option value="Reserve">Réservé</option>
                            <option value="En_reparation">En réparation</option>
                            <option value="En_transit">En transit</option>
                            <option value="Louee">Louée</option>
                            <option value="Hors_service">Hors service</option>
                        </select>
                    </div>
                </div>

                <h3>Autres Informations</h3>
                <div class="infos">
                    <div class="info">
                        <label for="Commentaires_Notes">Commentaires ou Notes :</label>
                        <textarea name="Commentaires_Notes" id="Commentaires_Notes"></textarea>
                    </div>
                    <div class="info">
                        <label for="photo">Photo :</label>
                        <input type="file" name="photo" id="photo">
                    </div>
                </div>

                <div class="btn">
                    <input type="submit" name="submit" value="Ajouter">
                </div>
                <div class="a">
                    <a href="tableCars.php">Revenir</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>