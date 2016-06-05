<?php
require_once ("../session.php");
require_once ("../class.user.php");
$auth_user = new USER();

$umail = $_SESSION['user_email'];
$tipo = $_SESSION['user_tipologia'];
 
	$stmt = $auth_user -> runQuery('SELECT * FROM Autore;');
    $stmt -> execute();  
?>

<head>
	<style>
		td.details-control {
			background: url('/Libreria/images/details_open.png') no-repeat center center;
			cursor: pointer;
		}
		tr.shown td.details-control {
			background: url('/Libreria/images/details_close.png') no-repeat center center;
		}

		 
	 .autors  { 
			margin-top: 25px;
			padding-top: 5px;
			padding-left: 10px;
			padding-right: 10px; 
		}
	.Mostra {
			padding: 10px 10px 10px 36px;
			font-family: "Trebuchet MS", Arial, Verdana;
			background: #e9e9e9 url(./img/vis.png) 8px 8px no-repeat;
			border-radius: 13px;
			border: 1px solid #d9d9d9;
			text-shadow: 1px 1px #fff;
		}
		
	</style>
</head>
<body>
	 
		<div class="autors">
			<h3 align="center">Lista Autori</h3> 
			<?php if ($stmt->rowCount()!=0): ?>
            	<div id="tabella">
  						           
  						<table id="list" class="display table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    					<thead class="personale">
      					<tr>
      					  <th>Autore</th>
      					  <th>Eta</th>
      					  <th>Nickname</th>
      					  <th>ID</th>
     					  <th> </th>
     					 </tr>
    					</thead>
  		  						<tbody>
  		  							<?php while ($userRow=$stmt->fetch(PDO::FETCH_ASSOC)): ?>
      							<tr>
      							  <td class="col-md-3"><?php echo $userRow['Nome'], " ", $userRow['Cognome']; ?></td>
     						      <td class="col-md-3"><?php echo $userRow['Eta']; ?></td>
     						      <td class="col-md-3"><?php echo $userRow['Nickname']; ?></td>
     						      <td class="col-md-3"><?php echo "#", $userRow['ID']; ?></td>
     						      <td align="left" style="border: 0;" class="col-md-3"><div class="visualizza" id="<?php echo $userRow['ID']; ?>"></div></td>
     							 
     							 </tr> 
     							 <?php endwhile; ?>
      						  </tbody>
  						</table>
			   </div>
            <?php endif; ?>
          </div>
         
<script src="/Libreria/js/autori.js"></script>
</body>
