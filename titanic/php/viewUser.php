<?php
$id = $_GET['id'];
include "connect.php";
$query = "SELECT * from client where id_client = $id";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);


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
            border-radius: 2em;
            box-shadow: 0px 0px 30px green;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="item">
            <h1>Utilisateur n°<?= $user['id_client'] ?></h1>
            <div class="infos">
                <div class="info">
                    <p>Nom Complete : </p>
                    <p><?= $user['nom_complet'] ?></p>
                </div>
                <div class="info">
                    <p>Username : </p>
                    <p><?= $user['username'] ?></p>
                </div>
                <div class="info">
                    <p>CIN : </p>
                    <p><?= $user['cin'] ?></p>
                </div>
                <div class="info">
                    <p>Age : </p>
                    <p><?= $user['age'] ?></p>
                </div>
                <div class="info">
                    <p>Email : </p>
                    <p><?= $user['email'] ?></p>
                </div>
                <div class="info">
                    <p>Telephone : </p>
                    <p><?= $user['telephone'] ?></p>
                </div>
                <div class="info">
                    <p>Genre : </p>
                    <p><?= $user['genre'] ?></p>
                </div>
                <div class="btn">
                    <a href="tableUsers.php">Revenir</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>