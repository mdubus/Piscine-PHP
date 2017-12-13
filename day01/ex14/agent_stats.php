#!/usr/bin/php
<?PHP

$tab = file('php://stdin');
unset($tab[0]);

if ($argv[1] == "moyenne")
{
	$nb = 0;
	foreach ($tab as $line)
	{
		$notes = explode (";", $line);
		if (strlen($notes[1]) && $notes[2] != "moulinette")
		{
			$moyenne += $notes[1];
			$nb++;
		}
	}
	echo $moyenne / $nb."\n";
}
else if ($argv[1] == "moyenne_user")
{
	asort($tab);
	foreach ($tab as $key => $item)
	{
		$temp = explode (";", $item);
		$arr[$temp[0]][$key] = $item;
	}
	foreach ($arr as $user)
	{
		$nb = 0;
		$somme_user = 0;
		$moyenne = 0;
		foreach ($user as $line)
		{
			$note = explode (";", $line);
			if (strlen($note[1]) && $note[2] != "moulinette")
			{
				$somme_user += $note[1];
				$nb++;
			}
		}
		if ($nb != 0)
		{
		$moyenne = $somme_user / $nb;
		echo $note[0].":".$moyenne."\n";
		}
	}
}
else if ($argv[1] == "ecart_moulinette")
{
	asort($tab);
	foreach ($tab as $key => $item)
	{
		$temp = explode (";", $item);
		$arr[$temp[0]][$key] = $item;
	}
	foreach ($arr as $user)
	{
		$nb_user = 0;
		$somme_user = 0;
		$note_moulinette = 0;
		foreach ($user as $line)
		{
			$note = explode (";", $line);
			if (strlen($note[1]) && $note[2] != "moulinette")
			{
				$somme_user += $note[1];
				$nb_user++;
			}
			if ($note[2] == "moulinette")
				$note_moulinette = $note[1];
		}
		if ($nb_user != 0)
		{
			$moyenne_user = $somme_user / $nb_user;
			echo $note[0].":".($moyenne_user - $note_moulinette)."\n";
		}
	}
}
?>
