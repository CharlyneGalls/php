<?php
session_start();
require_once("config.inc.php");

function check_email_address($email)  {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function send_email($sujet, $titre, $msg, $email, $unsubscribeLink) {
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) {
		$passage_ligne = "\r\n";
	}
	else {
		$passage_ligne = "\n";
	}

	// Déclaration des messages au format texte et au format HTML.
	$message_html  = "<html><head>";
	$message_html .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	$message_html .= "<title>Pourquoi - app</title></head>";
	$message_html .= "<body style='background-color:#f2f2f2; margin:20px;'>";
	$message_html .= "<table style='width:100%; max-width:700px' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' align='center' width='700'>";
	$message_html .= "<tr><td bgcolor='#9e5579' style='font-size: 0; line-height:0; padding:0 10px 0 10px;' height='400' align='center'><img style='display: block;' src='http://charlynerivera.be/tfe/final/img/logo-pourquoi.png' alt='Logo pourquoi application' width='320' height='255' /></td></tr>";
	$message_html .= "<tr><td align='center'><p style='margin:35px 0 10px 0; font-weight:normal; font-size: 35px; color:#444444;'>" . $titre . "</p></td></tr>";
	$message_html .= "<tr><td style='padding: 0 25px;'><p style='font-family:arial, sans-serif; font-weight:normal; font-size: 16px; line-height:30px; color:#999999;'>" . $msg . "</p></td></tr>";
	$message_html .= "<tr><td style='padding:20px 25px;'><a href='" . BASE_URL . "/php/unsubscribe/" . $unsubscribeLink . "&email=" . $email . "' style='font-size:10px; text-decoration:none; text-transform:uppercase; color:#9e5579;'>[ Me désinscrire ]</a></td></tr>";
	$message_html .= "</table>";
	$message_html .= "</body></html>";

	// Création du header de l'e-mail.
	$header  = "From: " .REPLY_EMAIL . $passage_ligne;
	$header .= "Reply-to: " .REPLY_EMAIL. $passage_ligne;
	$header .= "MIME-Version: 1.0".$passage_ligne;
	$header .= "X-Priority: 3".$passage_ligne;
	$header .= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
	
	$message = $passage_ligne.$message_html.$passage_ligne;


	mail($email, $sujet, $message, $header);
}

function add_email_to_database($bdd, $email) {
	try {
		$req = $bdd->prepare("SELECT * FROM subscribers WHERE email = :email");
		$req->execute(array(
											'email' => $email
											));

		if($req->rowCount() > 0 ) {
	  	return false;
		}

		else {
			$unsubLink  = "";
			$unsubLink .= rand(1111, 99999);
			$unsubLink .= rand(1111, 99999);
			$unsubLink .= $email;
			$unsubLink  = md5($unsubLink);
			$unsubLink .= rand(1111, 99999);

			try {
				$req = $bdd->prepare("INSERT INTO subscribers(id, email, unsubscribeLink) VALUES(:id, :email, :unsubscribeLink)");
				$req->execute(array(
											'id' => NULL,
											'email' => $email,
											'unsubscribeLink' => $unsubLink
											));

				$sujet = "Pourquoi-app : inscription";
				$titre = "Inscription";
					$msg = "Votre inscription a bien été prise en compte. Vous receverez un e-mail de notification dès que l'application sera téléchargeable sur l'AppStore.";
				
				send_email($sujet, $titre, $msg, $email, $unsubLink);
				return true; // l'adresse mail a bien été ajoutée à la base de données
			}

			catch(PDOException $e) {
				echo "Erreur : " .$e->getMessage();
			}
		}
	}

	catch(PDOException $e) {
		echo "Erreur : " .$e->getMessage();
	}
}

function admin_loggedIn() {
	if($_SESSION['loggedIn'] != 1){
		return false;
	} else {
		return true;
	}
}

?>