<?php
	require_once('../functions/functions.inc.php');

	$hash = trim(strip_tags($_GET['hash']));
	$email = trim(strip_tags($_GET['email']));

	if (strlen($hash) == 0 || strlen($email) == 0) {
		$_SESSION['message'] = "Une erreur s'est produite, veuillez contacter l'administrateur.";
		header("Location: " . BASE_URL . "/index.php#inscription");
		die();
	}

	if(check_email_address($email)) {
		try {
			$req = $bdd->prepare("SELECT * FROM subscribers WHERE email = :email");
			$req->execute(array(
												'email' => $email
												));

			if($req->rowCount() == 1) {
		  	try {
					$req = $bdd->prepare("DELETE FROM subscribers WHERE email = :email");
					$req->execute(array(
														'email' => $email
														));
					$_SESSION['message'] = "Votre demande de désinscription a bien été prise en compte.";
					header("Location: " . BASE_URL . "/index.php#inscription");
					die();
				}
				catch(PDOException $e) {
          echo "Erreur : " .$e->getMessage();
        }
		  }
		  else {
		  	$_SESSION['message'] = "Une erreur s'est produite, veuillez contacter l'administrateur.";
				header("Location: " . BASE_URL . "/index.php#inscription");
				die();
		  }
		}
		catch(PDOException $e) {
      echo "Erreur : " .$e->getMessage();
    }
	}
	else {
		$_SESSION['message'] = "Une erreur s'est produite, veuillez contacter l'administrateur.";
		header("Location: " . BASE_URL . "/index.php#inscription");
		die();
	}

?>