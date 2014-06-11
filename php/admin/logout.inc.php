<?php
	require_once("../functions/functions.inc.php");
	session_destroy();
	session_start();
	$_SESSION['message'] = "Vous vous êtes déconnecté.";
	
	header("Location: index.php");
	exit();
?>