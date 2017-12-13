<?PHP

class House
{
	public function introduce()
	{
		print("House " . $this->getHouseName() . " of "
		. $this->getHouseSeat() . " : \"" . $this->getHouseMotto() ."\"" . PHP_EOL);
	}
}
?>
