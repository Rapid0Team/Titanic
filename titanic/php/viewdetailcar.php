<?php
$id = $_GET['id'];
include "connect.php";
$query = "SELECT * from cars where id_cars = $id";
$result = mysqli_query($con, $query);
$car = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Voiture</title>
    <link rel="stylesheet" href="../css/stylevieww.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Détails de la Voiture</h1>
        </header>

        <div class="car-details">
            <div class="car-image">
                <img src="<?= $car['photo'] ?>" alt="image.jpg">
            </div>
            <div class="car-infos">
                <h2><?php echo htmlspecialchars($car['model'] . " " . $car['marque']); ?></h2>
                <p><strong> Type Moteur :</strong> <?= $car['type_moteur'] ?></p>
                <p><strong> Transmission : </strong> <?= $car['transmission'] ?></p>
                <p><strong>Année :</strong> <?php echo htmlspecialchars($car['annee']); ?></p>
                <p><strong>Kilométrage :</strong> <?= $car['kilometre'] ?></p>
                <p><strong> Etat/Région :</strong> <?= $car['etat_region'] ?></p>
                <p><strong>Prix :</strong> <?php echo htmlspecialchars($car['prix']); ?>DH</p>
                <div class="color">
                    <strong>Couleur :</strong>
                    <div style="width: 30px; height: 30px; border-radius: 50%; background-color:<?= $car['couleur'] ?>;"></div>
</div>
                <p><strong>Description :</strong><?= $car['Commentaires_Notes'] ?></p>
                <div class="btn">
                    <a href="Catalogue.php">Revenir</a>
                </div>
            </div>



        </div>

    </div>
</body>

</html>