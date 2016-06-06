<?php
session_start();
require_once ('class.user.php');
$user = new USER();

if ($user -> is_loggedin() != "") {
	$tipologia = $_SESSION['user_tipologia'];

	if (strcmp($tipologia, "Semplice") == 0) {
		$login -> redirect('homeSemplice.php');
	} else if (strcmp($tipologia, "Premium") == 0) {
		$login -> redirect('homePremium.php');
	} else if (strcmp($tipologia, "Amministratore") == 0) {
		$login -> redirect('homeAmministratore.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap-dialog.min.css" >  
		<link rel="stylesheet" href="css/jquery-ui.css">
	</head>

	<div class="container">
		<form class="form-signin" id="registra">
			<h2 align="center" class="form-signin-heading">Registrazione</h2>
			<div class="form-group">
				<label class="sr-only" for="form-first-name">Nome</label>
				<input type="text" name="form-first-name" placeholder="Nome..." class="form-control" id="form-first-name">
			</div>
			<div class="form-group">
				<label class="sr-only" for="form-last-name">Cognome</label>
				<input type="text" name="form-last-name" placeholder="Cognome..." class="form-control" id="form-last-name">
			</div>
			<div class="form-group">
				<label class="sr-only" for="form-email">Email</label>
				<input type="email" name="form-email" placeholder="Email..." class="form-control" id="form-email">
			</div>
			<div class="form-group">
				<label class="sr-only" for="form-pass">Password</label>
				<input type="password" name="form-pass" placeholder="Password..." class="form-control" id="form-pass">
			</div>
			<div class="form-group">
				<label class="sr-only" for="form-luogo">Luogo di Nascita</label>
				<input type="text" name="form-luogo" placeholder="Luogo di Nascita..." class="form-control" id="form-luogo">
			</div>
			<div class="form-group">
				<label class="sr-only" for="form-tel">Recapito Telefonico</label>
				<input type="text" name="form-tel" placeholder="Recapito Telefonico..." class="form-control" id="form-tel">
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">
				Registrati!
			</button>
			<label>Hai già un account? <a href="index.php">Loggati</a></label>
			</form>

	</div>
	<!-- /container -->

	<!-- Javascript -->
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-dialog.min.js"></script>
	<script src="js/InsSignUp.js"></script>

	</body>

</html>