<?php
require_once (dirname(dirname(__FILE__)) . '/session.php');
require_once (dirname(dirname(__FILE__)) . '/class.user.php');
$auth_user = new USER();

	$tit =  ($_POST['Tit']);
	$anno =  ($_POST['An']);
	$ed =  ($_POST['Edit']);
	$col =  ($_POST['Col']);
	$stmt = $auth_user -> runQuery('CALL ListaAutoriConLibri(:tit,:anno,:ed,:col)');
    $stmt -> execute(array(":tit" => $tit,":anno" => $anno,":ed" => $ed,":col" => $col));
	$row = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($row);

?>
