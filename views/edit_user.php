<?php

include '../connection/database.php';

$db = new Database();
$user_types = $db->get_user_types();
$user = $db->get_user($_GET['user_id']);

?>

<!-- Weer: Gevoelige data, dus gebruik POST! -->
<form method="post" action="../code/add_user.php">
	<input type="hidden" name="id" value="<?= $_GET['user_id'] ?>">

	<input type="text" name="username" placeholder="Gebruikersnaam" value="<?= $user['username'] ?>">
	<input type="text" name="email" placeholder="E-mailadres" value="<?= $user['email'] ?>">
	<input type="password" name="password" placeholder="Wachtwoord">

	<input type="submit" value="Opslaan">
</form>
