<?PHP session_start(); ?>
<?PHP include("header_connexion.php"); ?>
<!DOCTYPE html>
<html>
<body>

<!-- Connexion -->
<div id='content' id="connexion"><center>

	<form action="connexion_login.php" method="post">
		Adresse E-mail: <input type="text" name="mail" value="" />
		<br />
		Mot de passe:  <input type="password" name="passwd" value="" />
		<br />
		<input type="submit" name="submit" value="OK" />
	</form>
<?PHP
	if ($_SESSION['flag_log'] == "OK" && $_SESSION['mail'] != NULL)
	{
		echo "<p id='inscription-ok'>\nT-Rex vous salue, ".$_SESSION['logged_on_user']."!\n</p>";
		echo "<p>Allez faire un jurassic tour dans notre <a href=../boutique.php>boutique</a>\n</p>";
		echo "<p>Ou amusez vous avec nos dinosaures à <a href=../../index.php>l'accueil</a>\n</p>";
		$_SESSION['flag_log'] = "";
	}
	else if ($_SESSION['flag_log'] == "KO")
	{
		echo "<p id='error'>Vous n'êtes malheureusement pas encore inscrit\n</p>";
		echo "<p> Inscrivez-vous<a href=../inscription.php> ici</a>\n</p>";
		$_SESSION['flag_log'] = "";
	}
?>
</center></div>



</body>

<footer>

</footer>
</html>
