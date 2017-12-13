<?PHP

function auth($login, $passwd)
{
	$path = '../htdocs/private';
	$file = $path."/passwd";

	$unserialized = unserialize(file_get_contents($file));
	$iparmentier = hash("sha512", $passwd);
	foreach ($unserialized as $key=>$elem)
	{
		if ($elem['login'] == $login)
		{
			if ($elem['passwd'] == $iparmentier)
			{
				$_SESSION['loggued_on_user'] = $login;
				return (TRUE);
			}
			else
			{
				$loggued_on_user = "";
				return (FALSE);
			}
		}
	}
	return (FALSE);
}
























?>
