<?php
  require_once("../functions/functions.inc.php");

  if ($_POST) {
    if($_SESSION['loggedIn'] != 1){ 
      $_SESSION['message'] = "Vous devez être connecté.";
      header("Location: index.php");
      exit();
    }
    else {
        $sujet = trim(strip_tags($_POST['object']));
        $titre = trim(strip_tags($_POST['title']));
      $message = trim(strip_tags($_POST['messageArea']));

      if (strlen($sujet) == 0 || strlen($titre) == 0 || strlen($message) == 0) {
        $_SESSION['object'] = $sujet;
        $_SESSION['title'] = $titre;
        $_SESSION['messageArea'] =  $message;
        $_SESSION['message'] = "Veuillez remplir tous les champs.";
        header("Location: index.php");
        exit();
      }
      else {
        try {
          $req = $bdd->query("SELECT * FROM subscribers");
          if($req->rowCount() == 0) {
            $_SESSION['message'] = "Vous n'avez pas encore d'abonnés.";
            header("Location: index.php");
            exit();
          }
          else {
            while ($user = $req->fetch()) {
              $_SESSION['message'] =  "Votre email est en train d'être envoyé..."; 
              $email = $user['email'];
              $unsubLink = $user['unsubscribeLink'];
              send_email($sujet, $titre, $msg, $email, $unsubLink);
            }
            header("Location: index.php");
            exit();
          }
        }
        catch(PDOException $e) {
          echo "Erreur : " .$e->getMessage();
        }
      }
    }
  }
?>
