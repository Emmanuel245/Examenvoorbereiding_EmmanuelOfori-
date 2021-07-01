<?php
require_once '../connection/database.php';

$db = new Database();

$db->delete_user($_GET['user_id']);

header('location: users_overview2.php');