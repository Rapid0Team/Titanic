<?php
$id = $_GET['id'];
include "connect.php";
$query = "SELECT * from cars where id_cars = $id";
$result = mysqli_query($con, $query);
$car = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/view.css">
    <style>
        .container .item {
            background-image: url('../image/backgrouand.png');
            padding: 1em;
            width: 500px;
            height: auto;
            box-shadow: 0px 0px 30px green;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="item">
            <h1>Voiture n°<?= $car['id_cars'] ?></h1>
            <div class="img">
                <img src="<?= $car['photo'] ?>" alt="<?= $car['photo'] ?>">
            </div>

            <div class="infos">
                <div class="info">
                    <p>Marque : </p>
                    <p><?= $car['marque'] ?></p>
                </div>
                <div class="info">
                    <p>Model : </p>
                    <p><?= $car['model'] ?></p>
                </div>
                <div class="info">
                    <p>Année : </p>
                    <p><?= $car['annee'] ?></p>
                </div>
                <div class="info">
                    <p>VIN : </p>
                    <p><?= $car['vin'] ?></p>
                </div>
                <div class="info">
                    <p>Prix : </p>
                    <p><?= $car['prix'] ?>DH</p>
                </div>
                <div class="info">
                    <p>Type Moteur : </p>
                    <p><?= $car['type_moteur'] ?></p>
                </div>
                <div class="info">
                    <p>Transmission : </p>
                    <p><?= $car['transmission'] ?></p>
                </div>
                <div class="info">
                    <p>Couleur : </p>
                    <div style="width: 30px; height: 30px; border-radius: 50%; background-color:<?= $car['couleur'] ?>;"></div>
                </div>
                <div class="info">
                    <p>Kilométrage : </p>
                    <p><?= $car['kilometre'] ?>Km/h</p>
                </div>
                <div class="info">
                    <p>Nom de propriètaire : </p>
                    <p><?= $car['nom_proprietaire'] ?></p>
                </div>
                <div class="info">
                    <p>Numero de plaque : </p>
                    <p><?= $car['numero_plaque'] ?></p>
                </div>
                <div class="info">
                    <p>Etat/Région : </p>
                    <p><?= $car['etat_region'] ?></p>
                </div>
                <div class="info">
                    <p>Statut actuel : </p>
                    <p><?= $car['statut_actuel'] ?></p>
                </div>
                <div class="info">
                    <p>Commentaire/Note : </p>
                    <p><?= $car['Commentaires_Notes'] ?></p>
                </div>
                <div class="btn">
                    <a href="tablecars.php">Revenir</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>