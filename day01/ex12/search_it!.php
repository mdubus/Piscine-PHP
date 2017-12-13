#!/usr/bin/php
<?PHP
if ($argc >= 3)
{
	$i = 2;
	while ($i < $argc)
	{
		$str .= $argv[$i];
		if ($i + 1 != $argc)
			$str.= "&";
		$i++;
	}
	$str = str_replace(":", "=", $str);
	parse_str($str, $tab);
	if (array_key_exists($argv[1], $tab))
	{
		$result = $tab[$argv[1]];
		echo $result."\n";
	}
}
?>
