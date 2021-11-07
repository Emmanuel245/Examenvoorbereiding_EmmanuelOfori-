<?php

require_once '../connection/database.php';

$db = new Database();





$db->add_user(
    $_POST['type_id'],
    $_POST['username'],
    $_POST['email'],
    $_POST['password']
);




header('location: ../views/users_overview2.php');