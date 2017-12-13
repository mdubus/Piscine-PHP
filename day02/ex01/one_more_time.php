#!/usr/bin/php
<?PHP
function	test_month($month)
{
	$result = preg_match("/^([Jj]anvier|[Ff][ée]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[ûu]t|[Ss]eptembre|(([Oo]cto|[Nn]ovem|[Dd][eé]cem)bre))$/", "$month");
	if ($result != 0)
	{
	if (preg_match("/^[Jj]anvier$/", "$month") == 1)
		$result = 1;
	if (preg_match("/^[Ff][ée]vrier$/", "$month") == 1)
		$result = 2;
	if (preg_match("/^[Mm]ars$/", "$month") == 1)
		$result = 3;
	if (preg_match("/^[Aa]vril$/", "$month") == 1)
		$result = 4;
	if (preg_match("/^[Mm]ai$/", "$month") == 1)
		$result = 5;
	if (preg_match("/^[Jj]uin$/", "$month") == 1)
		$result = 6;
	if (preg_match("/^[Jj]uillet$/", "$month") == 1)
		$result = 7;
	if (preg_match("/^[Aa]o[ûu]t$/", "$month") == 1)
		$result = 8;
	if (preg_match("/^[Ss]eptembre$/", "$month") == 1)
		$result = 9;
	if (preg_match("/^[Oo]ctobre$/", "$month") == 1)
		$result = 10;
	if (preg_match("/^[Nn]ovembre$/", "$month") == 1)
		$result = 11;
	if (preg_match("/^[Dd][ée]cembre$/", "$month") == 1)
		$result = 12;
	}
	return ($result);
}

function	test_hour($hour)
{
	$hour = explode(":", $hour);
	if (count($hour) != 3)
		return (0);
	else
	{
		$flag = 1;
		if (preg_match("/^0[1-9]|1[0-9]|2[0-4]$/", "$hour[0]") == 0)
			$flag = 0;
		if (preg_match("/^0[1-9]|[1-5][0-9]|60$/", "$hour[1]") == 0)
			$flag = 0;
		if (preg_match("/^0[1-9]|[1-5][0-9]|60$/", "$hour[2]") == 0)
			$flag = 0;
		return ($flag);
	}
}

if ($argc > 1)
{
	$date = $argv[1];
	$tab = explode(" ", $date);
	if (count($tab) != 5)
		echo "Wrong Format\n";
	else
	{
		$flag = 0;
		if (preg_match("/^([lL]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)$/","$tab[0]") == 0)
			$flag = 1;
		if (preg_match("/^(0?[1-9]|[1-2][0-9]|3[0-1])$/", "$tab[1]") == 0)
			$flag = 1;
		$result = test_month($tab[2]);
		if ($result == 0)
			$flag = 1;	
		if (preg_match("/^[0-9]{4}$/", "$tab[3]") == 0)
			$flag = 1;
		if (test_hour($tab[4]) == 0)
			$flag = 1;
		if ($flag == 0)
		{
			echo "$num";
			$hour = explode(":", $tab[4]);
			date_default_timezone_set("Europe/Paris");
			$time = mktime($hour[0], $hour[1], $hour[2], $result, $tab[1], $tab[3]);
			echo "$time\n";
		}
		else
			echo "Wrong Format\n";
	}
}
?>
