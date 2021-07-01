<?php

include '../connection/database.php';

$db = new Database();
$db->update_user($_POST['id'], $_POST['type_id'], $_POST['username'], $_POST['email'], $_POST['password']);

header('Location: ../views/users_overview2.php');
