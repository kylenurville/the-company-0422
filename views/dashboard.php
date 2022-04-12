<?php
session_start();

include "../classes/user.php";

$user = new User;
$user_list = $user->getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Dashboard</title>
</head>
<body>
    <?php include "main-menu.php" ?>
    <main class="container" style="padding-top: 80px">
        <h2 class="text-muted display-6">USER LIST</h2>
        <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th><!-- for action buttons -->
                </tr>
            </thead>
            <tbody class="lead">
                <?php
                while($user = $user_list->fetch_assoc()){
                ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td>
                        <a href="edit-user.php?user_id=<?= $user['id'] ?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                        <a href="delete-user.php?user_id=<?= $user['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>