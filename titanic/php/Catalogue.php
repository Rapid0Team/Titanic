<?php
session_start();
include "nav.php";
?>
<?php
include "connect.php";
$query = "SELECT * from cars";
$result = mysqli_query($con, $query);
$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de Voitures</title>
    <link rel="stylesheet" href="../css/Cataloguee.css">
</head>

<body>

    <div class="container">

        <div class="car-list">
            <?php foreach ($cars as $car): ?>

                <div class="car-item">
                    <a href="viewdetailcar.php?id=<?= $car["id_cars"] ?>" style="text-decoration:none;color:white">
                        <img class="car-image" src="<?= $car['photo'] ?>" alt="image.jpg">
                        <h2>
                            <div class="info">
                                <p><?= $car['Commentaires_Notes'] ?></p>
                            </div>
                        </h2>
                        <p><strong>Prix :</strong> <?php echo htmlspecialchars($car['prix']); ?> €</p>
                        <h3>
                            <div class="info">
                                <p>Statut actuel : <?= $car['statut_actuel'] ?></p>

                            </div>
                        </h3>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>