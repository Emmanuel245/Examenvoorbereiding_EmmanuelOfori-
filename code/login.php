<?php

require_once '../connection/database.php';


$db = new Database();


$db->login($_POST['username'], $_POST['password']);

