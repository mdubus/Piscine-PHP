<?PHP session_start();
	$_SESSION['mail'] = $_POST['mail'];
	$mdp = hash("sha512", $_POST['passwd']);
	$_SESSION['passwd'] = $mdp;

include ("connexion_auth.php");
$ret_auth = auth($_SESSION['mail'], $_SESSION['passwd']);

if ($ret_auth == NULL)
{
	$_SESSION['flag_log'] = "KO";
	header('Location: connexion.php');
}
else
{
	$_SESSION['logged_on_user'] = $ret_auth['prenom'];
	$_SESSION['nom'] = $ret_auth['nom'];
	$_SESSION['mail'] = $ret_auth['mail'];
	$_SESSION['flag_log'] = "OK";
	header('Location: connexion.php');
}


?>
