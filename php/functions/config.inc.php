<?php

$hostname = "localhost";
	$username = "root";
	$password = "root";

		try {
			$bdd = new PDO("mysql:host=$hostname; dbname=mailing_list", $username, $password);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

	catch(PDOException $e){
		echo "Erreur : " . $e->getMessage();
	}

	define("BASE_URL", "http://localhost:8888/CharlyneRivera-3TID2-PHP/");
  define("REPLY_EMAIL", "info@charlynerivera.be");

?>