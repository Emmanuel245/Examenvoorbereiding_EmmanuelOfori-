<?php

require_once '../connection/database.php';

$db = new Database();





$db->update_user(
    $_POST['id'],
    $_POST['username'],
    $_POST['email'],
    $_POST['password']
);




header('location: ../views/users_overview2.php');