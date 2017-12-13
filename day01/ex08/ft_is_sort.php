<?PHP
function ft_is_sort($tab)
{
	$test = $tab;
	sort($test);
	$flag = 0;
	$i = 0;
	$nb_words = count($test);
	while ($i < $nb_words)
	{
		if ($test[$i] != $tab[$i])
			$flag = 1;
		$i++;
	}
	if ($flag == 1)
		return (0);
	else
		return (1);
}
?>
