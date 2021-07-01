<?php

require_once '../connection/database.php';

$db = new Database();



$db->add_department(
    $_POST['name'],
    $_POST['post_code'],
    $_POST['city'],
    $_POST['street'],
    $_POST['number']
    
);


header('location: ../views/departments_overzicht2.php');