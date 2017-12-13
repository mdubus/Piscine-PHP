#!/usr/bin/php
<?PHP

function concatenate_args($argv, $argc)
{
	$i = 1;
	while ($i < $argc)
	{
		$string .= " ".$argv[$i]." ";
		$i++;
	}
	return ($string);
}

function clean_string($string)
{
	$trimmed = trim($string);
	while ((strpos($trimmed, "  ")) == TRUE)
		$trimmed = str_replace("  ", " ", $trimmed);
	return ($trimmed);
}

function	custom_sort($a, $b)
{
	$ca = strtolower($a);
	$cb = strtolower($b);
	$i = 0;

	$comp = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	while (($i < strlen($a)) || ($i < strlen($b)))
	{
		$posa = strpos($comp, $ca[$i]);
		$posb = strpos($comp, $cb[$i]);
		if ($posa < $posb)
			return (-1);
		else if ($posa > $posb)
			return (1);
		else
			$i++;
	}
}

if ($argc > 1)
{
	$string = concatenate_args($argv, $argc);
	$string = clean_string($string);
	$tab = explode(" ", $string);
	usort($tab, "custom_sort");
	foreach ($tab as $value)
		echo ("$value\n");
}

?>
