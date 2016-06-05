<?php
require_once (dirname(dirname(__FILE__)) . '/session.php');
require_once (dirname(dirname(__FILE__)) . '/class.user.php');
$auth_user = new USER();
 $idAutore = strip_tags($_POST['ISBN']);
	$stmt = $auth_user -> runQuery('SELECT * FROM Libro WHERE ISBN= :CODICE;');
    $stmt -> execute(array(':CODICE' => $idAutore));
	$row = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($row);

?>
