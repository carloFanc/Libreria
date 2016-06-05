<?php
require_once ("session.php");

require_once ("class.user.php");
$auth_user = new USER();

if ($auth_user -> is_loggedin() != "") {
	$tipologia = $_SESSION['user_tipologia'];

	if (strcmp($tipologia, "Semplice") == 0) {

	} else if (strcmp($tipologia, "Amministratore") == 0) {
		$auth_user -> redirect('homeAmministratore.php');
	}
}

$umail = $_SESSION['user_email'];

$stmt = $auth_user -> runQuery("SELECT * FROM Utente WHERE Email=:umail");
$stmt -> execute(array(":umail" => $umail));

$userRow = $stmt -> fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Profilo Utente Semplice</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/home.css" rel="stylesheet"> 
		<link rel="stylesheet" href="css/jquery-ui.css">
	    <link rel="stylesheet" href="css/bootstrap-dialog.min.css" > 
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet"> 
<link href="css/responsive.bootstrap.min.css" rel="stylesheet"> 
<link href="css/jquery.dataTables.min.css" rel="stylesheet"> 
        
        <style type="text/css">
			/* Some custom styles to beautify this example */
			.main-content {
				min-height: 450px;
				background: #FDE3A7;
			}
			.search-content {
				padding-top: 10px;
				min-height: 80px;
				margin-bottom: 30px;
				background: #FDE3A7;
			} 
			.sidebar-content { 
				min-height: 560px; 
				background: #FDE3A7;
			} 
			.header { 
				background: #FDE3A7;
			} 
			 
</style>
	</head>
	
	<body >
			
			<header class="navbar navbar-default navbar-static-top header" role="banner">
			<!-- QUESTO E' IL DIV DEL MENU' IN ALTO  -->
			<div class="container">
				 
				<nav class="collapse navbar-collapse" role="navigation">
					 
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-user"></span>&nbsp;Ciao <?php echo $userRow['Nome']; ?></a>
							<ul class="dropdown-menu">
								<li>
									<a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</header>
			
			<div class="container">
        <div class="row">
            
            <div class="col-md-3">
                <!--Nested rows within a column-->
                 
				<div class="row">
                    <div class="col-md-12">
                        <div class="sidebar-content"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            	<div class="search-content">
                </div>
                <div class="main-content">
                </div>
            </div>
        </div>
    </div>
 
		<!-- script references -->
		<script src="js/jquery-2.2.4.min.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-dialog.min.js"></script> 
		<script src="js/jquery.dataTables.min.js"></script> 
		<script src="js/dataTables.bootstrap.min.js"></script> 
		<script src="js/dataTables.responsive.min.js"></script> 
		<script src="js/responsive.bootstrap.min.js"></script> 
		<script src="js/scripts.js"></script>
	</body>
</html>