#!/usr/bin/php
<?PHP
echo "Entrez un nombre: ";

$line = fgets(STDIN);

$line = trim($line);
if (is_numeric($line))
{
	if ($line % 2 == 0)
		echo "Le chiffre $line est Pair\n";
	else
		echo "Le chiffre $line est Impair\n";
}
else
{
	if (feof(STDIN))
	{
		echo "\n";
		exit();
	}
	else
		echo "'$line' n'est pas un chiffre\n";
}
//}
?>
