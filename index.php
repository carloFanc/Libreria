<?php
session_start();
require_once ("class.user.php");
$login = new USER();
if (isset($_SESSION['user_tipologia']) && !empty($_SESSION['user_tipologia'])) {
	$tipologia = $_SESSION['user_tipologia'];

}
if ($login -> is_loggedin() != "") {

	if (strcmp($tipologia, "Semplice") == 0) {
		$login -> redirect('homeSemplice.php');
	} else if (strcmp($tipologia, "Amministratore") == 0) {
		$login -> redirect('homeAmministratore.php');
	}
}

if (isset($_POST['btn-login'])) {
	$umail = strip_tags($_POST['form-mail']);
	$upass = strip_tags($_POST['form-password']);

	if ($login -> doLogin($umail, $upass)) {
		$tipologia = $_SESSION['user_tipologia'];
		if (strcmp($tipologia, "Semplice") == 0) {
			$login -> redirect('homeSemplice.php');
		} else if (strcmp($tipologia, "Amministratore") == 0) {
			$login -> redirect('homeAmministratore.php');
		}
	} else {
		$error = "Dati Errati !";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <style>
    	
    	.info{
    		width: 300px;
    		height: 300px;
    		  display:-moz-box;
    -moz-box-pack:center;
    -moz-box-align:center;

    /* Safari and Chrome */
    display:-webkit-box;
    -webkit-box-pack:center;
    -webkit-box-align:center;

    /* W3C */
    display:box;
    box-pack:center;
    box-align:center;
    	}
    </style>
	</head>

	<div class="container">

		<form class="form-signin" method="post">
			<h2 align="center" class="form-signin-heading">Log In</h2>
			<label class="sr-only" for="form-mail">Email</label>
											<input type="email" name="form-mail" placeholder="Email..." class="form-username form-control" id="form-username">
			<label class="sr-only" for="form-password">Password</label>
											<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			<button class="btn btn-lg btn-primary btn-block" name="btn-login" type="submit">
				Entra!
			</button>
			<label>Non hai ancora un account? <a href="indexsignup.php">Registrati</a></label>
		</form>
		
	</div>
 
	<div class="row">
    <div class="col-md-3 col-md-offset-5"><h4>Email: utente@gmail.com </br> Password: utente</h4></div>
    </div>
	<!-- /container -->

	<!-- Javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.min.js"></script>

	</body>

</html>