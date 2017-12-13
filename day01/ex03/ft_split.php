<?PHP
function ft_split($text)
{
	$test = explode(" ", $text);
	$result = array_filter($test, 'strlen');
	sort($result);
	return($result);
}
?>
