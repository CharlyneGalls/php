<?php
  session_start();
  $message = $_SESSION['message'];
  $_SESSION['message'] = "";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=no" />

    <title>Pourquoi | Landing page</title>

    <meta name="author" content="Charlyne Rivera - charlynerivera.be - @RiveraCharlyne">
    <meta name="description" content="Pourquoi, l'application iOS qui aide les parents à répondre aux questions de leurs enfants.">
    <meta name="keywords" content="pourquoi ?, pourquoi, Charlyne, Charlyne Rivera, parents, enfants, application, application iOS, application iPhone, application native, esiaj, heaj, albert jacquard, tfe, dwm, namur, belgique">
    
    <link rel="icon" type="image/png" href="img/favicon.png" /> 
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Lato:100,300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>

  <body>
    
    <header>
      <div class="container">
        <hgroup class="left">
          <h1>Pourquoi ?</h1>
          <h2>L'application iOS qui aide les parents<br />à répondre aux questions de leurs enfants.</h2>
          <a href="https://github.com/CharlyneRivera/pourquoi" target="_blank">Disponible sur Github</a>
        </hgroup>
        <div class="iphone right">
          <img class="right" src="img/header-iphone.gif" width="272" height="551" alt="Pourquoi - iPhone">
        </div>
      </div>
    </header>

    <h3>Inscription</h3>
    
    <section id="inscription">
      <h2>Pour être informé de sa sortie sur l'AppStore, c'est simple, il suffit d'une adresse e-mail.</h2>
        
        <?php include("php/inscription.view.php"); ?>
        <?php if(strlen($message) > 0){?><span class="erreurs"><?php echo $message; ?></span><?php }?>
        
    </section>

    <footer>
      <a href="https://github.com/CharlyneRivera/pourquoi" target="_blank">
       <figure>
          <img src="img/footer-logo.svg" alt="Footer - Logo" />
          <figcaption>Pourquoi</figcaption>
        </figure>
      </a>
      <a class="admin" href="php/admin">[ Administrateur ]</a>
    </footer>

  </body>
</html>
