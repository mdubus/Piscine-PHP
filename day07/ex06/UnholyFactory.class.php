<?PHP

class UnholyFactory
{
	public $fighter = Array();
	public function absorb($bonhomme)
	{
		$type = new ReflectionClass($bonhomme);
		if ($type->getParentClass())
		{
			$name = $bonhomme->returnName();
			if (array_key_exists($name, $this->fighter))
				print "(Factory already absorbed a fighter of type " . $name . ")" . PHP_EOL;
			else
			{
				print "(Factory absorbed a fighter of type " . $name . ")" . PHP_EOL;
				$this->fighter[$name] = $bonhomme;
			}
		}
		else
			print "(Factory can't absorb this, it's not  a fighter)" . PHP_EOL;
	}
	public function fabricate($fab)
	{
		if (array_key_exists($fab, $this->fighter))
		{
			print "(Factory fabricates a fighter of type " . $fab . ")" . PHP_EOL;
			return (clone $this->fighter[$fab]);
		}
		else
		{
			print "(Factory hasn't absorbed any fighter of type " . $fab . ")" . PHP_EOL;
			return (NULL);
		}
	}
}

?>
