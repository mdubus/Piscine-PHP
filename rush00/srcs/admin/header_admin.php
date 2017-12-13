<?PHP session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Dino-Shop</title>
  <link rel="stylesheet" type="text/css" href="../css/dinoshop.css">
  <meta name="google" content="notranslate"/>
</head>

<body>
  <div id="head">
  <a href="../../index.php"><img src="../../img/logo-dino.jpg"/></a>
  <a href="../../index.php"><h1>Dino-Shop</h1></a>
</div>


  <div id="menu">
  <ul>
    <li><a href="../qui-sommes-nous.php">Qui sommes nous ?</a></li>
    <li><a href="../boutique.php">Boutique</a></li>
	<li><a href="../contact.php">Contact</a></li>
<?php
	if ($_SESSION['logged_on_user'] != "")
	{
		echo"<li><a href='../connexion/mon_compte.php'>Mon Compte</a></li>";
		echo"<li><a href='../connexion/deconnexion.php'>Deconnexion</a></li>";
	}
	else
	{
		echo"<li><a href='../inscription.php'>Inscription</a></li>";
		echo"<li><a href='../connexion/connexion.php'>Connexion</a></li>";
	}
?>

	<li><a href="../panier.php">Panier <?php
      if (!$_SESSION['nb_articles'])
        $_SESSION['nb_articles'] = 0;
	  echo "(".$_SESSION['nb_articles'].")";?></a></li>
<?php
			if ($_SESSION['logged_on_user'] == "admin")
			{
      			echo"<li><a href='admin.php'>Admin</a></li>";
			}
?>

  </ul>
</div>
</body>
</html>
