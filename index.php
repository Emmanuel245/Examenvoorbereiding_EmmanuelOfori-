<?php

require_once '../Examenvoorbereiding/connection/database.php';

// Dit doet al public function __contruct
$db = new Database();

$db->create_admin();
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="assets/css/style">

    <title>Examenvoorbereiding</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">


  </head>

  <body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="/Examenvoorbereiding_EmmanuelOfori-/code/login.php" class="signin-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" value="login" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
