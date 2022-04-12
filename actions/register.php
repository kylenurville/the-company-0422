<?php
include "../classes/User.php";

# Collect all form data
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$username   = $_POST['username'];
$password   = $_POST['password'];

$user = new User;

# Call the method
$user->create($first_name, $last_name, $username, $password);