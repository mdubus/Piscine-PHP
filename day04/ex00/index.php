<?PHP
session_start();
if (isset($_GET['login']) && $_GET['login'] != NULL &&
	isset($_GET['passwd']) && $_GET['passwd'] != NULL &&
	($_GET['submit'] && $_GET['submit'] === "OK"))
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form method="get" action="index.php">
	Identifiant: <input type="text" name="login" value="<?PHP echo $_SESSION['login'];?>" />
	<br />
	Mot de passe : <input type="password" name="passwd" value="<?PHP echo $_SESSION['passwd'];?>" />
	<input type="submit" name = "submit" value="OK" />
</form>
</body></html>
