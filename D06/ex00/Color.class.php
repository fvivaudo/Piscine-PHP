<?php


class Color
{
	public static $verbose = 0;
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public $rgb = 0;

	public static function doc()
	{
		echo (file_get_contents("Color.doc.txt"));
	}
	function __construct(Array $args)
	{
		if ($args['rgb'])
		{
			$this->rgb = $args['rgb'];
			$this->red = (int)(255 & ($this->rgb >> 16));
			$this->green = (int)(255 & ($this->rgb >> 8));
			$this->blue = (int)(255 & ($this->rgb));
		}
		else
		{
			$this->red = (integer)$args['red'];
			$this->green = (integer)$args['green'];
			$this->blue = (integer)$args['blue'];
		}
		if (Color::$verbose == True)
		{
			printf("Color( red:%4d, green:%4d, blue:%4d ) ", $this->red, $this->green, $this->blue);
			print('constructed.'.PHP_EOL);
		}
		return $this;
	}
	function __destruct()
	{
		if (Color::$verbose == True)
		{
			printf("Color( red:%4d, green:%4d, blue:%4d ) ", $this->red, $this->green, $this->blue);
			print('destructed.'.PHP_EOL);
		}
		return;
	}
	public function add($rhs)
	{
		return (new Color(array('red' => ((($this->red + $rhs->red) >= 0 && ($this->red + $rhs->red) <= 255) ? ($this->red + $rhs->red) : ($this->red)), 'green' => ((($this->green + $rhs->green) >= 0 && ($this->green + $rhs->green) <= 255) ? ($this->green + $rhs->green) : ($this->green)), 'blue' => ((($this->blue + $rhs->blue) >= 0 && ($this->blue + $rhs->blue) <= 255) ? ($this->blue + $rhs->blue) : ($this->blue)))));
	}
	public function sub($rhs)
	{
		return (new Color(array('red' => ((($this->red - $rhs->red) >= 0 && ($this->red - $rhs->red) <= 255) ? ($this->red - $rhs->red) : ($this->red)), 'green' => ((($this->green - $rhs->green) >= 0 && ($this->green - $rhs->green) <= 255) ? ($this->green - $rhs->green) : ($this->green)), 'blue' => ((($this->blue - $rhs->blue) >= 0 && ($this->blue - $rhs->blue) <= 255) ? ($this->blue - $rhs->blue) : ($this->blue)))));
	}
	public function mult($f)
	{
		return (new Color(array('red' => ((($this->red * $f) >= 0 && ($this->red * $f) <= 255) ? ($this->red * $f) : ($this->red)), 'green' => ((($this->green * $f) >= 0 && ($this->green * $f) <= 255) ? ($this->green * $f) : ($this->green)), 'blue' => ((($this->blue * $f) >= 0 && ($this->blue * $f) <= 255) ? ($this->blue * $f) : ($this->blue)))));
	}
    function __toString()
    {
        return sprintf("Color( red:%4d, green:%4d, blue:%4d )", $this->red, $this->green, $this->blue);
    }
}
?>