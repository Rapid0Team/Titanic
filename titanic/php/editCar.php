<?php
include "connect.php";
$id = $_GET['id'];
$query = "SELECT * from cars where id_cars = $id";
$result = mysqli_query($con, $query);
$car = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    extract($_POST);
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $source = $_FILES['photo']['tmp_name'];
        $destination = "../photosCars/" . $_FILES['photo']['name'];
        move_uploaded_file($source, $destination);
    } else {
        $destination = $car['photo'];
    }

    $query = "UPDATE `cars` SET
            `marque`='$marque',
            `model`='$model',
            `annee`='$annee',
            `vin`='$vin',
            `prix`='$prix',
            `type_moteur`='$type',
            `transmission`='$transmission',
            `couleur`='$couleur',
            `kilometre`='$kilometre',
            `nom_proprietaire`='$nom_proprietaire',
            `numero_plaque`='$numero_plaque',
            `etat_region`='$etat_region',
            `statut_actuel`='$statut_actuel',
            `Commentaires_Notes`='$Commentaires_Notes',
            `photo`='$destination' 
            WHERE id_cars = $id";

    mysqli_query($con, $query);
    header("location:tableCars.php");
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
        .a {
            text-align: center;
            margin-top: 2em;
        }

        .a a {
            text-decoration: none;
            color: #fff;
            border: 1px solid #fff;
            background-color: green;
            padding: 10px 20px;
            border-radius: 2em;
            transition: .6s ease;
        }

        .a a:hover {
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
                        <input type="text" value="<?= $car['marque'] ?>" name="marque" id="marque">
                    </div>
                    <div class="info">
                        <label for="model">Modèle :</label>
                        <input type="text" value="<?= $car['model'] ?>" name="model" id="model">
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <label for="annee">Année :</label>
                        <input type="number" value="<?= $car['annee'] ?>" name="annee" id="annee">
                    </div>
                    <div class="info">
                        <label for="vin">VIN :</label>
                        <input type="text" name="vin" value="<?= $car['vin'] ?>" id="vin" placeholder="Numéro d’identification du véhicule...">

                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <label for="prix">Prix :</label>
                        <input type="number" value="<?= $car['prix'] ?>" name="prix" id="prix">
                    </div>
                </div>

                <h3>Spécifications</h3>
                <div class="infos">
                    <div class="info">
                        <select name="type" id="type">
                            <option value="ne pas sélectionner" <?php echo $car['type_moteur'] == 'ne pas sélectionner' ? 'selected' : '' ?>>Type de moteur</option>
                            <option value="diesel" <?php echo $car['type_moteur'] == 'diesel' ? 'selected' : '' ?>>Diesel</option>
                            <option value="essence" <?php echo $car['type_moteur'] == 'essence' ? 'selected' : '' ?>>Essence</option>
                            <option value="electrique" <?php echo $car['type_moteur'] == 'electrique' ? 'selected' : '' ?>>Électrique</option>
                            <option value="hybride" <?php echo $car['type_moteur'] == 'hybride' ? 'selected' : '' ?>>Hybride</option>

                        </select>
                    </div>
                    <div class="info">
                        <select name="transmission" id="transmission">
                            <option value="ne pas sélectionner" <?php echo $car['type_moteur'] == 'ne pas sélectionner' ? 'selected' : '' ?>>Transmission</option>
                            <option value="manuelle" <?php echo $car['transmission'] == 'manuelle' ? 'selected' : '' ?>>Manuelle</option>
                            <option value="automatique" <?php echo $car['transmission'] == 'automatique' ? 'selected' : '' ?>>Automatique</option>
                            <option value="CVT" <?php echo $car['transmission'] == 'CVT' ? 'selected' : '' ?>>CVT</option>
                        </select>
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <label for="couleur">Couleur :</label>
                        <input type="color" value="<?= $car['couleur'] ?>" name="couleur" id="couleur">
                    </div>
                    <div class="info">
                        <label for="km">Kilométrage :</label>
                        <input type="number" value="<?= $car['kilometre'] ?>" name="kilometre" id="km">
                    </div>
                </div>

                <h3>Propriétaire et Statut</h3>
                <div class="infos">
                    <div class="info">
                        <label for="nom_proprietaire">Nom du propriétaire :</label>
                        <input type="text" value="<?= $car['nom_proprietaire'] ?>" name="nom_proprietaire" id="nom_proprietaire">
                    </div>
                    <div class="info">
                        <label for="NP">Numéro de plaque d’immatriculation :</label>
                        <input type="text" value="<?= $car['numero_plaque'] ?>" name="numero_plaque" id="NP">
                    </div>
                </div>

                <div class="infos">
                    <div class="info">
                        <label for="etat_region">État/Région d’immatriculation :</label>
                        <input type="text" value="<?= $car['etat_region'] ?>" name="etat_region" id="etat_region">
                    </div>
                    <div class="info">
                        <select name="statut_actuel" id="statut_actuel">
                            <option value="ne pas sélectionner" <?php echo $car['type_moteur'] == 'ne pas sélectionner' ? 'selected' : '' ?>>Statut actuel</option>
                            <option value="Disponible" <?php echo $car['statut_actuel'] == 'Disponible' ? 'selected' : '' ?>>Disponible</option>
                            <option value="En_attente" <?php echo $car['statut_actuel'] == 'En_attente' ? 'selected' : '' ?>>En attente</option>
                            <option value="Reserve" <?php echo $car['statut_actuel'] == 'Reserve' ? 'selected' : '' ?>>Réservé</option>
                            <option value="En_reparation" <?php echo $car['statut_actuel'] == 'En_reparation' ? 'selected' : '' ?>>En réparation</option>
                            <option value="En_transit" <?php echo $car['statut_actuel'] == 'En_transit' ? 'selected' : '' ?>>En transit</option>
                            <option value="Louee" <?php echo $car['statut_actuel'] == 'Louee' ? 'selected' : '' ?>>Louée</option>
                            <option value="Hors_service" <?php echo $car['statut_actuel'] == 'Hors_service' ? 'selected' : '' ?>>Hors service</option>
                        </select>
                    </div>
                </div>

                <h3>Autres Informations</h3>
                <div class="infos">
                    <div class="info">
                        <label for="Commentaires_Notes">Commentaires ou Notes :</label>
                        <textarea name="Commentaires_Notes" value="<?= $car['Commentaires_Notes'] ?>" id="Commentaires_Notes"><?= $car['Commentaires_Notes'] ?></textarea>
                    </div>
                    <div class="info">
                        <label for="photo">Photo :</label>
                        <input type="file" name="photo" id="photo">
                    </div>
                </div>

                <div class="btn">
                    <input type="submit" name="submit" value="Modifier">
                </div>
                <div class="a">
                    <a href="tableCars.php">Revenir</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>