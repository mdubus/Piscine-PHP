<?PHP session_start();

if ($_POST['submit'] == "Oui..")
{
	$_SESSION['flag_log'] = "KO";
	$_SESSION['logged_on_user'] = "";
	$_SESSION['nom'] = "";
	$_SESSION['mail'] = "";
	header('Location: deconnexion.php');
}
else
{
	$_SESSION['flag_log'] = "OK";
	header('Location: ../../index.php');
}

?>
