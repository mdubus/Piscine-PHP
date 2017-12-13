<?PHP
session_start();

function	get_data()
{
	if ((isset($_POST['nom']) && $_POST['nom'] != NULL) &&
  (isset($_POST['prenom']) && $_POST['prenom'] != NULL) &&
  (isset($_POST['mail']) && $_POST['mail'] != NULL) &&
  (isset($_POST['passwd1']) && $_POST['passwd1'] != NULL) &&
  (isset($_POST['passwd2']) && $_POST['passwd2'] != NULL) &&
  (isset($_POST['submit']) && $_POST['submit'] === "Envoyer") &&
  ($_POST['passwd1'] == $_POST['passwd2']))
	{
		$tab['nom'] = $_POST['nom'];
    $tab['prenom'] = $_POST['prenom'];
    $tab['mail'] = $_POST['mail'];
		$tab['passwd'] = hash(sha512, $_POST['passwd1']);
	}
	else
	{
		if ($_POST['passwd1'] != $_POST['passwd2'])
		{
				$_SESSION['flagpasswd'] = "ko";
			  header('Location: admin-users.php');
			exit();
		}
		else
		{
				$_SESSION['flagchamps'] = "ko";
		    header('Location: admin-users.php');
			exit();
		}
	}
	return ($tab);
}

$path = "../../private";
$file = $path."/passwd";

$tab = get_data();
if (!file_exists($path))
{
	mkdir ($path);
}

if (!file_exists($file))
{
	$unserialized[] = $tab;
	$serialized[] = serialize($unserialized);
	file_put_contents($file, $serialized);
	$_SESSION['flagcreation'] = "ok";
	header('Location: admin-users.php');
	exit();
}
else
{
	$unserialized = unserialize(file_get_contents($file));
	foreach ($unserialized as $elem)
	{
		foreach ($elem as $mail=>$value)
		{
			if ($value == $tab['mail'])
			{
				$_SESSION['flagmail'] = "ko";
				header('Location: admin-users.php');
				exit();
			}
		}
	}
	$unserialized[] = $tab;
	$serialized = serialize($unserialized);
	file_put_contents($file, $serialized);
	$_SESSION['flagcreation'] = "ok";
	header('Location: admin-users.php');
	exit();
}
?>
