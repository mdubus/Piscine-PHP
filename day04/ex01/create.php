<?PHP
session_start();

function	get_data()
{
	if ((isset($_POST['login']) && $_POST['login'] != NULL) &&
		(isset($_POST['passwd']) && $_POST['passwd'] != NULL) &&
		(isset($_POST['submit']) && $_POST['submit'] === "OK"))
	{
		$tab['login'] = $_POST['login'];
		$tab['passwd'] = hash(sha512, $_POST['passwd']);
	}
	else
	{
		echo "ERROR\n";
		exit();
	}
	return ($tab);
}

$path = "../htdocs/private";
$file = $path."/passwd";

$tab = get_data();
if (!file_exists($path))
{
	mkdir ("../htdocs/");
	mkdir ($path);
}

if (!file_exists($file))
{
	$unserialized[] = $tab;
	$serialized[] = serialize($unserialized);
	file_put_contents($file, $serialized);
}
else
{
	$unserialized = unserialize(file_get_contents($file));
	foreach ($unserialized as $elem)
	{
		foreach ($elem as $login=>$value)
		{
			if ($value == $tab['login'])
			{
				echo "ERROR\n";
				exit();
			}
		}
	}
	$unserialized[] = $tab;
	$serialized = serialize($unserialized);
	file_put_contents($file, $serialized);
}
echo "OK\n";
?>
