<?php

require_once ('dbconfig.php');

class USER {

	private $conn;
	public $error = "";
	public function __construct() {
		$database = new Database();
		$db = $database -> dbConnection();
		$this -> conn = $db;
	}

	public function runQuery($sql) {
		$stmt = $this -> conn -> prepare($sql);
		return $stmt;
	}

	public function errorGetter() {
		return $this -> error;

	}

	public function errorSetter($data) {
		$this -> error = $data;

	}

	public function register($uname, $ucogn, $umail, $upass,$uluogo,$utel) {
		try {

			$utip = 'Semplice';
			$stmt = $this -> conn -> prepare("INSERT INTO Utente(Email, Nome, Cognome, Password, Tipologia,Luogo_Nascita, Telefono) 
		                                               VALUES(:umail, :uname, :ucogn, :upass, :utip, :uluogo,:utel)");

			$stmt -> bindparam(":umail", $umail);
			$stmt -> bindparam(":uname", $uname);
			$stmt -> bindparam(":ucogn", $ucogn);
			$stmt -> bindparam(":utip", $utip);
			$stmt -> bindparam(":upass", $upass);
			$stmt -> bindparam(":uluogo", $uluogo);
			$stmt -> bindparam(":utel", $utel);
			$stmt -> execute();

			return $stmt;
		} catch(PDOException $e) {
			echo $e -> getMessage();
		}
	}

	 
	public function doLogin($umail, $upass) {
		try {
			$stmt = $this -> conn -> prepare("SELECT * FROM Utente WHERE Email=:umail AND Password=:upass ");
			$stmt -> bindparam(":umail", $umail);
			$stmt -> bindparam(":upass", $upass);
			$stmt -> execute();
			$userRow = $stmt -> fetch(PDO::FETCH_ASSOC);
			if ($stmt -> rowCount() == 1) {
				$_SESSION['user_email'] = $userRow['Email'];
				$_SESSION['user_tipologia'] = $userRow['Tipologia'];
				return true;
			} else {
				return false;
			}
		} catch(PDOException $e) {
			echo $e -> getMessage();
		}
	}

	public function is_loggedin() {
		if (isset($_SESSION['user_email'])) {
			return true;
		}
	}

	public function redirect($url) {
		header("Location: $url");
	}

	public function doLogout() {
		session_destroy();
		unset($_SESSION['user_email']);
		return true;
	}
 

}
?>