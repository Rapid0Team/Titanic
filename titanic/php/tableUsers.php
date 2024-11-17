<?php

include 'connect.php';
$query = "SELECT * from client where role = 'user'";
$result = mysqli_query($con, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$num_users = count($users);
$num = 0;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE from client where id_client = '$id'";
    mysqli_query($con, $query);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/tableUserse.css">
</head>
    
<body>
    <div class="container">
        <h1>Tableau d'utilisateurs</h1>
        <p>Nombre d'utilisateurs : <span style="font-weight: bolder;"><?= $num_users ?></span></p>
        <div class="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>idClient</th>
                    <th>Username</th>
                    <th>CIN</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $num += 1 ?></td>
                        <td><?= $user['id_client'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['cin'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a href="viewUser.php?id=<?= $user['id_client']?>" class="view">View</a>
                            <a href="editUser.php?id=<?= $user['id_client']?>" class="edit">Edit</a>
                            <a href="tableUsers.php?id=<?= $user['id_client']?>" class="delete" onclick="return confirm('Tu es sûr ?')" delete>Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>

</html>