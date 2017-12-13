<?PHP

class Color
{
	public $red;
	public $green;
	public $blue;
	public static $verbose = FALSE;

	public function __Construct(array $color)
	{
		if (isset($color['red']) && isset($color['blue']) && isset($color['green']))
		{
			$this->red = intval($color['red']);
			$this->green = intval($color['green']);
			$this->blue = intval($color['blue']);
		}
		else if (isset($color['rgb']))
		{
			$this->red = intval(($color['rgb'] >> 16) & 255);
			$this->green = intval(($color['rgb'] >> 8) & 255);
			$this->blue = intval($color['rgb'] & 255);
		}
		if (Self::$verbose)
		{
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n",
				$this->red, $this->green, $this->blue);
		}
	}

	public function __toString()
	{
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )",
			array ($this->red, $this->green, $this->blue)));
	}

	public function __Destruct()
	{
		if (Self::$verbose)
		{
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n",
				$this->red, $this->green, $this->blue);
		}
	}

	public static function doc()
	{
		return (file_get_contents('Color.doc.txt'));
	}

	public function add($new_color)
	{
		return (new Color(array('red' => $this->red + $new_color->red, 
			'green' => $this->green + $new_color->green, 
			'blue' => $this->blue + $new_color->blue)));
	}

	public function sub($new_color)
	{
		return (new Color(array('red' => $this->red - $new_color->red, 
			'green' => $this->green - $new_color->green, 
			'blue' => $this->blue - $new_color->blue)));
	}

	public function mult($new_color)
	{
		return (new Color(array('red' => $this->red * $new_color, 
			'green' => $this->green * $new_color, 
			'blue' => $this->blue * $new_color)));
	}
}
?>
