<?php

require_once '../connection/database.php';

$db = new Database();
$users_overview = $db->users_overview();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	// HTML heeft alleen een date-input, en een time-input.
	// MySQL accepteerd alleen Y-m-d H:i:s (bijv. 2021-06-04 13:30:00)
	// Dus die zullen we aan elkaar moeten zetten, zodat MySQL de input uit HTML snapt.
	$starts_at = $_POST['start_date'] . ' ' . $_POST['start_time'];
	$ends_at = $_POST['end_date'] . ' ' . $_POST['end_time'];

	$db->insert_hour($_POST['user_id'], $starts_at, $ends_at);

	header('Location: ../views/hours_overview2.php');
}

?>
