<?php
  require_once("../functions/functions.inc.php");
  $loggedIn = admin_loggedIn();
  
  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $_SESSION['message'] = "";
  }
  
  if (isset($_SESSION['object'])) {
    $object = $_SESSION['object'];
  } else {
    $object = "";
  }
  if (isset($_SESSION['title'])) {
    $title = $_SESSION['title'];
  } else {
    $title = "";
  }
  if (isset($_SESSION['messageArea'])) {
    $messageArea = $_SESSION['messageArea'];
  } else {
    $messageArea = "";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" />
    <title>Pourquoi | Login admin</title>
    <meta name="author" content="@RiveraCharlyne">
    <meta name="description" content="Pourquoi, ...">

    <link rel="icon" type="image/png" href="../../img/favicon.png" /> 
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Lato:300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/reset.min.css">
    <link rel="stylesheet" href="../../css/main.css">
  </head>

  <body>

  <?php if(!$loggedIn) { //l'utilisateur est loggé ?>

    <section id="admin-login">

      <?php if($message) echo "<h3>".$message."</h3>"; ?>

        <form action="login.inc.php" method="post" accept-charset="UTF-8">
          <fieldset>
            <legend><img src="../../img/logo-pourquoi.svg" alt="Logo - Pourquoi"/></legend>
              <div>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" placeholder="Entrer votre nom d'utilisateur" required="required">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" placeholder="Entrer votre mot de passe" required="required">
              </div>
            <button type="submit" name="submit">Se connecter</button>
          </fieldset>
        </form>
    </section>

  <?php } else { // l'utilisateur n'est pas loggé ?>

    <section id="interface-mail">
      <h2>Interface administrateur - email</h2>
      <?php if($message) echo "<h2>".$message."</h2>"; ?>
      <a href="logout.inc.php">[ Me déconnecter ]</a>

      <form action="mail.inc.php" method="post" accept-charset="UTF-8">
        <fieldset>
          <legend><img src="../../img/logo-pourquoi.svg" alt="Logo - Pourquoi"/></legend>
            <div>
              <label for="object">Objet</label>
              <input type="text" name="object" placeholder="Saisir l'objet du mail" required="required">
              <label for="title">Titre</label>
              <input type="text" name="title" placeholder="Saisir le titre du mail" required="required">
              <label for="messageArea">Message</label>
              <textarea name="messageArea" placeholder="Saisir le message du mail" required="required"></textarea>
            </div>
          <button type="submit" name="submit">Envoyer</button>
        </fieldset>
      </form>
    </section>

  <?php } ?>

  </body>
</html>
