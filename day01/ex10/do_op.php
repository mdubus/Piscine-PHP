#!/usr/bin/php
<?PHP
if ($argc != 4)
	echo "Incorrect Parameters\n";
else
{
	if (strpos($argv[2], "+") !== false)
		echo ($argv[1] + $argv[3])."\n";
	else if (strpos($argv[2], "-") !== false)
		echo ($argv[1] - $argv[3])."\n";
	else if (strpos($argv[2], "*") !== false)
		echo ($argv[1] * $argv[3])."\n";
	else if (strpos($argv[2], "/") !== false)
		echo ($argv[1] / $argv[3])."\n";
	else if (strpos($argv[2], "%") !== false)
		echo ($argv[1] % $argv[3])."\n";
}
?>
