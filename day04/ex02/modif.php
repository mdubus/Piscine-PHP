<?PHP
session_start();

function	get_data()
{
	if ((isset($_POST['login']) && $_POST['login'] != NULL) &&
		(isset($_POST['oldpw']) && $_POST['oldpw'] != NULL) &&
		(isset($_POST['newpw']) && $_POST['newpw'] != NULL) &&
		(isset($_POST['submit']) && $_POST['submit'] === "OK"))
	{
		$tab['login'] = $_POST['login'];
		$tab['newpw'] = hash(sha512, $_POST['newpw']);
		$tab['oldpw'] = hash(sha512, $_POST['oldpw']);
	}
	else
	{
		echo "ERROR\n";
		exit();
	}
	return ($tab);
}

$path = '../htdocs/private';
$file = $path."/passwd";

$tab = get_data();

$unserialized = unserialize(file_get_contents($file));
$flag = 0;

foreach ($unserialized as $key=>$elem)
{
	if ($elem['login'] == $tab['login'])
	{
		if ($elem['passwd'] == $tab['oldpw'])
		{
			$unserialized["$key"]['passwd'] = $tab['newpw'];
			$flag = 1;
		}
		else
		{
			echo "ERROR\n";
			exit();
		}
	}
}

if ($flag == 1)
{
	$serialized = serialize($unserialized);
	file_put_contents($file, $serialized);
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
