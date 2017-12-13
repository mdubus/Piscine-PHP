<?PHP
session_start();
$path = "../../private";
$file = $path."/passwd";
$flag = 0;
if (!file_exists($path))
{
	$_SESSION['no-user-to-delete'] = "ko";
}
else
{
	$unserialized = unserialize(file_get_contents($file));
	if (count($unserialized) > 0)
	{
		foreach ($unserialized as $elem=>$value)
		{
			if ($value['mail'] == $_POST['mail'])
			{
				unset($unserialized[$elem]);
				$flag = 1;
			}
		}
	}
	else {
		$_SESSION['no-user-to-delete'] = "ko";
		header('Location: admin-users.php');
		exit();
	}
}
if ($flag == 1)
{
	$serialized = serialize($unserialized);
	file_put_contents($file, $serialized);
	$_SESSION['flag_suppression_user'] = "ok";
	header('Location: admin-users.php');
	exit();
}
else {
	$_SESSION['flag_suppression_user'] = "ko";
	header('Location: admin-users.php');
	exit();

}
?>
