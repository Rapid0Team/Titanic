<?php 
    include 'connect.php';
    $query = "SELECT * from cars";
    $result = mysqli_query($con, $query);
    $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magasin de Voitures</title>
    <link rel="stylesheet" href="../css/infos.css">
</head>
<body>

<header>
    <h1>Magasin de Voitures</h1>
</header>

<main>
    <section id="info-magasin">
        <h2>À propos de nous</h2>
        <p>Bienvenue dans notre magasin de voitures, votre destination pour les voitures de luxe et de haute performance.</p>
    </section>
    <section id="voitures">
        <h2>Nos Voitures</h2>
        <?php foreach($cars as $car): ?>
        <div class="car-card">
            <img src="<?= $car['photo'] ?>" alt="Voiture 1">
            <h3>Modèle : <?= $car['model'] ?></h3>
            <p>Prix: <?= $car['prix']?>DH</p>
            <p>Type de moteur: <?= $car['type_moteur'] ?></p>
        </div>
        <?php endforeach ?>
        
    </section>
    <section id="videos">
        <h2>Vidéos de Présentation</h2>
        <video controls width="400">
            <source src="../image/video1.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la lecture des vidéos.
        </video>
        <video controls width="400">
            <source src="../image/video2.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la lecture des vidéos.
        </video>
    </section>
</main>

<footer>
    <p>&copy; 2024 Magasin de Voitures. Tous droits réservés.</p>
</footer>

</body>
</html>