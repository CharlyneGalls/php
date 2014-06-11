<?php
	require_once("../functions/functions.inc.php");

	if ($_POST) {
		$username = trim(strip_tags($_POST['username']));
		$password = trim(strip_tags($_POST['password']));

		if (strlen($username) == 0 || strlen($password) == 0) {
			$_SESSION['message'] = "Saisir nom d'utilisateur et mot de passe";
			header("Location: index.php");
			exit();
		}

		else {
			$password = md5($password);

			try {
				$req = $bdd->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
				$req->execute(array(
													'username' => $username,
													'password' => $password
													));
				if($req->rowCount() == 1) {
	  			$_SESSION['loggedIn'] = 1;
					header("Location: index.php");
					exit();
				} else {
					$_SESSION['message'] = "Nom d'utilisateur et/ou mot de passe incorrect.";
					header("Location: index.php");
					exit();
				}
			}

			catch(PDOException $e) {
				echo "Erreur : " .$e->getMessage();
			}
		}
	}
?>
