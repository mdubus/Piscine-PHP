#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$trimmed = trim($argv[1]);
	while ((strpos($trimmed, "  ")) == TRUE)
		$trimmed = str_replace("  ", " ", $trimmed);
	echo("$trimmed\n");
}
?>
