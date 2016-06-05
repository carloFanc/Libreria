<?php 
require_once (dirname(dirname(__FILE__)) . '/class.user.php');

$user = new USER();
$idAutore = strip_tags($_POST['idAutore']);

$stmt = $user -> runQuery("SELECT * FROM Libro WHERE IdAutore=:id");
$stmt -> execute(array(':id' => $idAutore));
$row = $stmt -> fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);
?>