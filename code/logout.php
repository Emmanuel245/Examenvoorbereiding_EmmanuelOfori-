<?php

session_start();

unset($_SESSION['logged_in_as']);
unset($_SESSION['is_admin']);

header('location: ../index.php');

