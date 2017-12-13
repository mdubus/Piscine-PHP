<?PHP
session_start();
include 'auth.php';
if (isset($_GET['login']) && $_GET['login'] != NULL && isset($_GET['passwd']) && $_GET['passwd'] != NULL)
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
	if (auth($_SESSION['login'], $_SESSION['passwd']) == TRUE)
		echo "OK\n";
	else
		echo "ERROR\n";
}
else
{
	echo "ERROR\n";
	exit();
}

?>
