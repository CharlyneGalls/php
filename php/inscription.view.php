<?php
	require_once("functions/functions.inc.php");

	if($_POST) {
		$email = trim(strip_tags($_POST['email']));

		if(check_email_address($email)) {
			if(add_email_to_database($bdd, $email)){
				$message = "Merci pour votre inscription, un email de confirmation va vous être envoyé.";
			} 
			else{
				$message = "Oops, vous vous êtes déjà inscrit.";
			}
		}
		else {
			$message = "Votre adresse e-mail n'est pas valide.";
		}
	}
?>
  
<form class="subscribe-form" action="index.php#inscription" method="post" accept-charset="UTF-8">
  <fieldset>
    <legend>Mailing-list</legend>
    <label for="email">Email *:</label>
    <input class="subscribe-input" type="email" name="email" placeholder="john@doe.be" required="required">
    <button class="subscribe-submit" type="submit" name="submit">S'inscrire</button>
  </fieldset> 
</form>