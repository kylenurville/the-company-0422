<?php

include "../classes/User.php";

$user_id = $_POST['user_id'];

$user = new User;

$user->delete($user_id);