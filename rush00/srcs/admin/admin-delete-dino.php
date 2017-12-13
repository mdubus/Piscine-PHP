<?PHP
session_start();
$path = "../../bdd";
$file = $path."/serialized";
$flag = 0;
if (!file_exists($path))
{
	$_SESSION['no-dino-to-delete'] = "ko";
}
else
{
	$unserialized = unserialize(file_get_contents($file));
	if (count($unserialized) > 0)
	{
		foreach ($unserialized as $elem=>$value)
		{
			if ($value[0] == $_POST['id'])
			{
				unset($unserialized[$elem]);
				$flag = 1;
			}
		}
	}
	else {
		$_SESSION['no-dino-to-delete'] = "ko";
		header('Location: admin-products.php');
		exit();
	}
}
if ($flag == 1)
{
	$i = 0;
	$unserialized = array_values($unserialized);
	foreach ($unserialized as $dino=>$value)
	{
		$unserialized[$dino][0] = ($i + 1);
		$i++;
	}

	print_r ($unserialized);
	$serialized = serialize($unserialized);
	file_put_contents($file, $serialized);
	$_SESSION['flag_suppression_dino'] = "ok";
	echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
	exit();
}
else {
	$_SESSION['flag_suppression_dino'] = "ko";
	echo "<meta http-equiv='refresh' content='0,url=admin-products.php'>";
	exit();
}
?>
