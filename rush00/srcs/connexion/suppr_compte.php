<?PHP session_start(); ?>
<?PHP include("header_connexion.php"); ?>
<?PHP

		$crypt = file_get_contents("../../private/passwd");
		$un_crypt = unserialize($crypt);
		$i = 0;

		foreach ($un_crypt as $elem)
		{
			if ($elem['nom'] == $_SESSION['nom'] 
				&& $elem['logged_on_user'] == $_SESSION['prenom'] 
				&& $elem['mail'] == $_SESSION['mail'])
			{
				$_SESSION['flag_log'] = "KO";
				$_SESSION['logged_on_user'] = "";
				$_SESSION['nom'] = "";
				$_SESSION['mail'] = "";
				$_SESSION['passwd'] = "";
				unset($un_crypt[$i]);
				$un_crypt = array_values($un_crypt);
				$crypt = serialize($un_crypt);
				file_put_contents("../../private/passwd", $crypt);
				echo "<p id='inscription-ok'>\nVotre compte a ete correctement supprime. Au revoir!<br />Vous allez etre redirige vers l'accueil dans un instant.</p>";
				echo "<meta http-equiv='refresh' content='4,url=../../index.php'>";
			}
			$i++;
		}
?>
