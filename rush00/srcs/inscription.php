<?PHP session_start(); ?>
<?php  include("header.php"); ?>
<!DOCTYPE html>
<html>
<body>

<div id="formulaire">
  <p> Veuillez remplir le formulaire. Tous les champs sont obligatoires</p>
  <br/>
<form method="post" action="check-inscription.php">
	Nom: <input type="text" name="nom"/><br /><br />
  Prenom : <input type="text" name="prenom"/><br /><br />
  Mail : <input type="text" name="mail"/><br /><br />
  Mot de passe : <input type="password" name="passwd1"/><br /><br />
  Répéter le mot de passe : <input type="password" name="passwd2"/><br /><br />
	<input type="submit" name = "submit" value="Envoyer" />
</form>
</div>
</body>
</html>
<?php
  if ($_SESSION['flagchamps'] == "ko")
  {
    echo "<p id='error'>Erreur : vous devez remplir tous les champs\n</p>";
    $_SESSION['flagchamps'] = NULL;
  }
  else if ($_SESSION['flagmail'] == "ko")
  {
	  echo "<p id='error'>Erreur : un compte existe déjà avec cette adresse mail\n</p>";
    $_SESSION['flagmail'] = NULL;
  }
  else if ($_SESSION['flagpasswd'] == "ko")
  {
	  echo "<p id='error'>Erreur : veuillez recopier votre mot de passe a l'identique\n</p>";
    $_SESSION['flagpasswd'] = NULL;
  }
  else if ($_SESSION['flagcreation'] == "ok")
    {
      echo "<div id='inscription-ok'>Inscription terminée !<br/><br/><a href='connexion/connexion.php'>Connectez-Vous! :)</a></div>";
      $_SESSION['flagcreation'] = NULL;
    }

?>
