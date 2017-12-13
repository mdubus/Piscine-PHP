<?PHP

class Tyrion extends Lannister
{
	public function sleepWith($someone)
	{
		$name = new ReflectionClass($someone);
		if ($name->getName() == "Sansa")
			print "Let's do this." . PHP_EOL;
		else
			print ("Not even if I'm drunk !" . PHP_EOL);
	}
}

?>
