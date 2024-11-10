<?php

include 'connect.php';
$query = "SELECT * from cars";
$result = mysqli_query($con, $query);
$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

$num_cars = count($cars);
$num = 0;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE from cars where id_cars = '$id'";
    mysqli_query($con, $query);
    header('location:tableCars.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Cars</title>
    <link rel="stylesheet" href="../css/tableUserse.css">
    <style>
        .btn{
            margin-bottom: 1em;
        }
        .btn a{
            text-decoration: none;
            color: black;
            background: #fff;
            padding: 10px 20px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tableau de voitures</h1>
        <div class="btn">
            <a href="addCar.php">Ajouter voiture</a>
        </div>
        <p>Nombre des voitures : <span style="font-weight: bolder;"><?= $num_cars ?></span></p>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>idCars</th>
                    <th>Marque</th>
                    <th>Model</th>
                    <th>VIN</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($cars as $car): ?>
                    <tr>
                        <td><?= $num += 1 ?></td>
                        <td><?= $car['id_cars'] ?></td>
                        <td><?= $car['marque'] ?></td>
                        <td><?= $car['model'] ?></td>
                        <td><?= $car['vin'] ?></td>
                        <td>
                            <a href="viewCar.php?id=<?= $car['id_cars']?>" class="view">View</a>
                            <a href="editCar.php?id=<?= $car['id_cars']?>" class="edit">Edit</a>
                            <a href="tableCars.php?id=<?= $car['id_cars']?>" class="delete" onclick="return confirm('Tu es sûr ?')" delete>Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>

</html>