<?php
session_start();

include "../classes/User.php";

$user = new User;
$user_row = $user->getUser($_GET['user_id']);
$full_name = $user_row['first_name'] . " " . $user_row['last_name'];
// $full_name = "John" . " " . "Smith";

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
    <title>Delete User</title>
</head>
<body>
    <?php include "main-menu.php" ?>
    <main class="container" style="padding-top: 80px">
        <div class="card w-25 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center text-danger">DELETE USER</h2>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
                    <p class="fw-bold mb-0">Are you sure you want to delete "<?= $full_name ?>"?</p>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
                    </div>
                    <div class="col">
                        <form action="../actions/delete-user.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $_GET['user_id'] ?>">
                            <button type="submit" class="btn btn-danger w-100">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>