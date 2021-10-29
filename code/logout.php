<?php

session_start();

unset($_SESSION['logged_in_as']);
unset($_SESSION['is_admin']);
unset($_SESSION['is_user']);

header('location: ../index.php');

