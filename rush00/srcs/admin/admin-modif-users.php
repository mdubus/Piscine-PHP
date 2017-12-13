<?PHP session_start(); ?>
<?PHP


if ($_POST['prenom'] != "" && $_POST['prenom'] != "admin" 
	&& $_POST['nom'] != "" && $_POST['nom'] != "admin" 
	&& $_POST['mail'] != "" && $_POST['mail'] != "admin" 
	&& $_POST['submit'] == "OK")
{
 
		$crypt = file_get_contents("../../private/passwd");
		$un_crypt = unserialize($crypt);
		$i = 0;

		foreach ($un_crypt as $elem)
		{
			if ($elem['mail'] == $_POST['mail'] && $elem['nom'] == $_POST['nom'] && $elem['prenom'] == $_POST['prenom'])
			{
				$un_crypt[$i]['prenom'] = $_POST['newprenom'];
				$un_crypt[$i]['nom'] = $_POST['newnom'];
				$un_crypt[$i]['mail'] = $_POST['newmail'];
				$crypt = serialize($un_crypt);
				file_put_contents("../../private/passwd", $crypt);
				$_SESSION['flag_modif_users'] = "OK";
				echo "<meta http-equiv='refresh' content='0,url=admin-users.php'>";
			}
			$i++;
		}
		$crypt = serialize($un_crypt);
		file_put_contents("../../private/passwd", $crypt);
		if ($_SESSION['flag_modif_users'] != "OK")
			$_SESSION['flag_modif_users'] = "KO";
		echo "<meta http-equiv='refresh' content='0,url=admin-users.php'>";

}
else
{
	$_SESSION['flag_modif_users'] = "KO";
	echo "<meta http-equiv='refresh' content='0,url=admin-users.php'>";
}
?>
