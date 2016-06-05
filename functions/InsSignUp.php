<?php 
require_once (dirname(dirname(__FILE__)) . '/class.user.php');

$user = new USER();

 if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['mail']) 
  && isset($_POST['pass']) && isset($_POST['luogo']) && isset($_POST['tel'])) {
	$uname = strip_tags($_POST['name']);
	$ucogn = strip_tags($_POST['surname']);
	$umail = strip_tags($_POST['mail']);
	$upass = strip_tags($_POST['pass']);
	$uluogo = strip_tags($_POST['luogo']);
	$utel = strip_tags($_POST['tel']);
	try {
		$stmt = $user -> runQuery("SELECT Email FROM Utente WHERE Email=:umail");
		$stmt -> execute(array(':umail' => $umail));
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);

		if ($row['Email'] == $umail) {
			echo ' '.$row['Email'].' '. $umail;
		} else {
			if ($user -> register($uname, $ucogn, $umail, $upass,$uluogo, $utel)) {
			 echo 'ok';
			}
		}
	} catch(PDOException $e) {
		echo $e -> getMessage('Error');
	} 
}
?>