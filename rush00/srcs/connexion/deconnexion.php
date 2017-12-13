<?PHP session_start(); ?>
<?PHP include("header_connexion.php"); ?>
<!DOCTYPE html>
<html>
<body>
	<!-- Deonnexion -->
	<div id='content'><center>
	<form action="deco_logout.php" method="post">
		<h3>Souhaitez-vous vous deconnecter?</h3>
		<input type="submit" name="submit" value="Oui.." />
		<input type="submit" name="submit" value="NON!!" />
	<center></form>
	<?PHP

		if ($_SESSION['flag_log'] == "KO" && $_SESSION['logged_on_user'] == NULL)
		{
			echo "<p id='inscription-ok'>\nVous avez ete correctement deconnecte, a bientot!\n</p>";
			$_SESSION['flag_log'] = "";
		}
		else if ($_SESSION['flag_log'] = "OK" && $SESSION['logged_on_user'] != NULL)
		{
			echo "<p id='inscription-ok'>\nOUf! Restez encore un peu avec nous!\n</p>";
			$_SESSION['flag_log'] = "";
		}
	?>
	</div>
</body>

<footer>

</footer>
</html>
