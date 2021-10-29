<?php

require_once '../connection/database.php';


$db = new Database();


$db->login_user($_POST['username'], $_POST['password']);
$db->login($_POST['username'], $_POST['password']);

